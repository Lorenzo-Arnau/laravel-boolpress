<?php

namespace App\Http\Controllers;
use App\Author;
use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

// ------------------------------------- necessari per mail
use App\Mail\DetailsImageMail;
use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $posts = Post::all();
        return view('post',compact('authors','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('create',compact('authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('public');
        $dataToStore=$request->all();
        $thisAuthor_id= $request['author_id'];
        if (!Author::find($thisAuthor_id)) {
            return redirect()->route('post.create');
        }

        $newPost=new Post();
        $newPost->fill($dataToStore);
        $newPost->pics=$path;
        $newPost->save();

        $newPost->tags()->attach($dataToStore['tags']);
        Mail::to('mail@mail.com')->send(new DetailsImageMail($newPost));
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('comments',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        foreach($post->comments as $comment){
            $comment->delete();
        }
        foreach($post->tags as $tag){
            $tag->delete();
        }
            $post->delete();
            return redirect()->route('post.index');

    }
}
