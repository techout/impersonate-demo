<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(10);
        $users = User::allImpersonatable();
        return view('blog.index')->with('posts', $posts)->with('users', $users);
    } // end getIndex()

    public function getSingle($slug){
        // fetch from the database based on slug
        $post = Post::where('slug', '=', $slug)->first();

        // return the view and pass in the post object
        return view('blog.single')->with('post', $post);
    } // end getSingle()
} // end BlogController class
