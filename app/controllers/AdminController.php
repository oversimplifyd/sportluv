<?php

class AdminController extends BaseController
{

    public function getIndex()
    {
        $posts = Post::all();
        return View::make('admin/index')->with('posts', $posts);
    }

    public function addPost()
    {
        return View::make('admin/add_post');
    }

    public function viewPost($id)
    {
        $post = Post::find($id);

        if($post)
        {
            return View::make('admin/view_post')->with('post', $post);
        }
    }

    public function findPost($id)
    {

    }

    public function createPost()
    {
        $user_id = Auth::user()->id;
        $tag = Input::get('tag');
        $description = Input::get('description');
        $image = "An unprocessed image";

        if($user_id)
        {
            $post = Post::create(array(
                'user_id' => $user_id,
                'tag' => $tag,
                'description' => $description,
                'photo_image' => $image
            ));
        }
        return Redirect::route('admin/index');
    }

    /*Posts will be listed out for a nadmin
    Posts will include buttons, therefore, an Admin will be
    Able to create new Posts
    Delete Existing post
    Add New Post
    Edit Post

    Post Properties
    Post Title
    Post Description
    Post Images
    Post Link (optional)

    Add Post
    Takes you to the Add post page and shows u a form to add new post

    View Post
    Takes you to the List of posts for a specified period

    Admin Login page
     */
}
