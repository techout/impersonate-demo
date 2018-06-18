<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{

    public function getAbout(){
        return view('pages.about');
    } // end getAbout()


    public function getContact(){
        return view('pages.contact');
    } // end getContact()

    public function postContact(Request $request){
        $request->validate([
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message   // message is a variable already defined in Mail(?), so we can't use message
        ];

        Mail::send('emails.contact', $data, function($msg) use($data){
            $msg->from($data['email']);
            $msg->to('hello@devmarketer.io');
            $msg->subject($data['subject']);
        });
        
        Session::flash('success', 'Email Sent');

        return redirect('/');
    } // end postContact()

    public function getIndex(){

        $posts = Post::orderBy('id', 'desc')->take(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    } // end getIndex()
} // end PagesController class
