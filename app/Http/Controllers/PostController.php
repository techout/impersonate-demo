<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

use Auth;
use Image;
use Purifier;
use Session;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', '=', Auth::id())->orderBy('id', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    } // end index()

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    } // end create()

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts',
            'category_id' => 'required|integer',
            'featured_image' => 'sometimes|image',
            'body' => 'required'
        ]);

        // store in the database
        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        // save image
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path("images/$filename");
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        // associate tags
        $post->tags()->sync($request->tags, false);

        // set the flash message
        Session::flash('success', "Post created.");

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    } // end store()

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    } // end show()

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
    } // end edit()

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'featured_image' => 'sometimes|image',
            'body' => 'required'
        ]);

        // save the data to the database
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        // save image
        if($request->hasFile('featured_image')){
            // add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path("images/$filename");
            Image::make($image)->resize(800, 400)->save($location);

            $oldFileName = $post->image;

            // update the database
            $post->image = $filename;

            // delete the old photo
            Storage::delete($oldFileName);
        }

        $post->save();

        // create association with tags
        $post->tags()->sync($request->tags);

        // set flash data with success message
        Session::flash('success', 'Post updated.');

        // redirect to posts.show
        return redirect()->route('posts.show', $post->id);
    } // end update()

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // clean up connections to Tags
        $post->tags()->detach();

        $post->delete();

        Session::flash('success', 'Post deleted.');

        return redirect()->route('posts.index');
    } // end destroy()
} // end PostController class
