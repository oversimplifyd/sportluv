<?php

class UsersController extends BaseController {

    public function getAdminIndex()
    {
        $tags = Post::$tags;
        return View::make('admin/index')->with('tags', $tags);
    }

    public function getAdminLogin()
    {
       return View::make('admin/login');
    }

    public function getAdminLogout()
    {
        Auth::logout();
        return Redirect::route('admin_login');
    }
    
    public function postAdminLogin()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        $admin_permission = 1;
        
        if (Auth::attempt(array('username' => $username, 'password' => $password, 'permission' =>$admin_permission)))
        {
            return  Redirect::route('admin_add_post');
        }else{
            return  Redirect::route('admin_login')->with('error','Username or Password is incorrect');
        }
    }
}

/*
 public function postSignup()
 {
     $validation = Validator::make(Input::all(), User::$signup_rules);

     if($validation->fails())
     {
         return $validation->errors();
     }

     return "Validated";
 }

 public function getSignup()
 {
     return View::make('signup');
 }*/
