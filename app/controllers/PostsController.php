<?php

class PostsController extends BaseController {

	public function getIndex()
	{
        $posts = Post::remember(60)->paginate(4);
        return View::make('index')->with('posts', $posts);
	}
    
	public function viewPost($id)
	{
		$post = Post::find($id);
        
        if($post)
        {
            return View::make('view_post')->with('post', $post);
        }
	}

    /************************************************************************
     * **********************************************************************
     *
     * ADMIN REQUEST HANDLING
     *
     * **********************************************************************
     ************************************************************************/

    public function adminFindPost()
	{
        if(isset($_POST['submit_by_date']))
        {
            $from = Input::get('from');
            $to = Input::get('to');

            $from = str_replace("/", "-", $from);
            $to  = $this->increment_day($to, "-");

            $from = $from." 00:00:00";
            $to = $to." 00:00:00";

            $compare_date = strcmp($from, $to);
            if($compare_date > 0 || $compare_date < 0)
            {
                $posts = Post::whereBetween('created_at', array($from, $to))->get();
            }else
            {
                $posts = Post::where('created_at', '>=', $from)->get();
            }

            // These sessions ae used to application state
            Session::forget('view_posts_state');
            Session::put('view_posts_state.state', 'date_state');
            Session::put('view_posts_state.date_range_from', $from);
            Session::put('view_posts_state.date_range_to', $to);
            return View::make('admin/view_posts')->with('posts', $posts);;

        }else if(isset($_POST['submit_by_tag']))
        {
            $tag = Input::get('tag');
            $posts = Post::where('tag', '=', $tag)->get();
            Session::forget('view_posts_state');
            Session::put('view_posts_state.state', 'tag_state');
            Session::put('view_posts_state.tag', $tag);
            return View::make('admin/view_posts')->with('posts', $posts);;
        }else
        {
            Session::forget('view_posts_state');
            $posts = Post::all();
            return View::make('admin/view_posts')->with('posts', $posts);;
        }
	}

    public function adminAddPost()
    {
        $tags = Post::$tags;
        return View::make('admin/add_post')->with('tags', $tags);
    }

    public function adminEditPost($id)
    {
        $post = Post::find($id);
        $tags = Post::$tags;
        return View::make('admin/edit_post')->with(['post'=>$post, 'tags'=>$tags]);
    }

    public function adminDeletePost($id)
    {
        $post = Post::find($id);
        if($post->post_image !== "default_image.jpg"){
            File::delete(public_path('post_uploads/'.$post->post_image));
        }
        $post->delete();
        return Redirect::route('admin_update_view');
    }

    public function adminViewPost($id)
    {
        $post = Post::find($id);
        return View::make('admin/view_post')->with('post', $post);
    }

    public function adminViewPosts($date_range =null)
    {
        /*$post = Post::find($id);*/
           /* return View::make('view_post')->with('post', $post);*/
        if(!is_null($date_range)){

        }else {
            $posts = Post::all();
            return View::make('admin/view_posts')->with('posts', $posts);
        }
    }

    public function adminCreatePost()
	{
        // Checks if this user is an authenticated user
        $user_id = Auth::user()->id;

        if($user_id)
        {
            $validation = Validator::make(Input::all(), Post::$post_rules);
            if($validation->fails()) {
                return Redirect::route('admin_add_post')->with('error', $validation->errors()->first());
            }

            //Retrieve all form inputs
            $tag = Input::get('tag');
            $title = Input::get('title');
            $description = Input::get('description');
            $image = Input::file('image');

            $image_location = $this->handleUpload($image);

            //Persist the validated inputs and processed image to Database
            Post::create(array(
                'user_id' => $user_id,
                'tag' => $tag,
                'title' => $title,
                'description' => $description,
                'post_image' => $image_location
            ));
            return Redirect::route('admin_view_posts');
        }else {
            return Redirect::route('admin_login');
        }
	}

    /**
     * This takes the i of the post to be updated
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminUpdatePost($id)
    {
        $user_id = Auth::user()->id;

        if($user_id)
        {
            //Validates Input
            $validation = Validator::make(Input::all(), Post::$post_rules);
            if($validation->fails()) {
                return Redirect::route('admin_add_post')->with('error', $validation->errors()->first());
            }

            $post_id = $id;
            $post = Post::findOrFail($post_id);

            //Retrieve all form inputs
            $tag = Input::get('tag');
            $title = Input::get('title');
            $description = Input::get('description');
            $image = Input::file('image');

            $image_location = $this->handleUpload($image, $post->post_image);

            //Persist the validated inputs and processed image to Database
            $post->user_id = $user_id;
            $post->tag = $tag;
            $post->title = $title;
            $post->description = $description;
            $post->post_image = $image_location;
            $post->save();

            return Redirect::route('admin_update_view');
        }else {
            return Redirect::route('admin_login');
        }
    }

    public function updateView()
    {
        if(Session::has('view_posts_state'))
        {
            $session_value = Session::get('view_posts_state.state');
            if($session_value === "date_state")
            {
                $from = Session::get('view_posts_state.date_range_from');
                $to = Session::get('view_posts_state.date_range_to');

                $compare_date = strcmp($from, $to);
                if($compare_date > 0 || $compare_date < 0)
                {
                    $new_posts = Post::whereBetween('created_at', array($from, $to))->get();
                }else
                {
                    $new_posts = Post::where('created_at', '>=', $from)->get();
                }
            }else{
                $tag = Session::get('view_posts_state.tag');
                $new_posts = Post::where('tag', $tag)->get();
            }
        }else
        {
            $new_posts = Post::all();
        }
        return View::make('admin/view_posts')->with('posts', $new_posts);
    }

    /************************************************************************
     * **********************************************************************
     *
     * UTILITY FUNCTIONS
     *
     * **********************************************************************
     ************************************************************************/

    /**
     * This function handles image up;load
     * @param $image to be handled
     * @param optional image_path if exists
     * @return full path of image
     */
    public function handleUpload($image, $previous_path=false)
    {
        if($image) {
            //Create a unique name for each post upload
            if($previous_path)
            {
                if (File::exists(Config::get('image.upload_folder'), $previous_path)) {
                    File::delete(Config::get('image.upload_folder').'/'.$previous_path);
                }
            }

           $fileName = $image->getClientOriginalName();
           $filename = pathinfo($fileName, PATHINFO_BASENAME);
           $fullName = Str::slug(Str::random(8) . $filename) . '.' . $image->getClientOriginalExtension();

           $upload = $image->move(Config::get('image.upload_folder'), $fullName);
           Image::make(Config::get('image.upload_folder') . '/' . $fullName)->resize(200, 200)->save(Config::get('image.upload_folder') . '/' . $fullName);

            // If upload is successful get the imag full path
            $image_location = ($upload) ? $fullName : "default_image.jpg";
        }else{
            $image_location = ($previous_path) ? $previous_path : "default_image.jpg";
        }
        return $image_location;
    }

    /**
     *This function takes a date string and increments the day
     * @param $string
     * @param $implode_with, this is the string separate date with
     * @return string
     */
    public function increment_day($string, $implode_with=false)
    {
        $string = $string;

        if ($implode_with) {
            $string = str_replace("/", $implode_with, $string);
            $date_array = explode($implode_with, $string);
        } else {
            $date_array = explode("/", $string);
        }

        $hour_string = $date_array[2];
        $hour_array = str_split($hour_string);

        if($hour_array[1] == "9")
        {
            $new_string = $hour_array[0]+1;
            $new_string = $new_string."0";
        }else if($hour_array[0] == "0")
        {
            $new_string = $hour_array[1]+1;
            $new_string = "0".$new_string;
        }else
        {
            $new_string = $hour_array[1]+1;
            $new_string = $hour_array[0].$new_string;
        }

        $date_array[2] = $new_string;
        if($implode_with)
        {
            $new_date = implode($implode_with, $date_array);
        }else {
            $new_date = implode("/", $date_array);
        }
        return $new_date;
    }
}