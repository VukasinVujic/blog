<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CreatCommentRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published();
        
        // return view('posts.index', ['posts' => $posts]);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatCommentRequest $request, $id)
    {
        // requst()->all() izbaciz atribut u ovoj gore funkciji i stavis ovo i u potpunosti isto radi
        // \Log::info(print_r($request_r($request->all(),ture)));
        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body
        // ]);

            \Log::info('Here');

            $request->validate([
                'title' => 'required|min:5',
                'body' => 'required'
            ]);

        Post::create($request->all());
            return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    //    $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
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
    public function destroy($id)
    {
        //
    }

    public function addComment(CreatCommentRequest $request, $id)
    {
        Comment::create([
            'post_id' => $id,
            'author' => $request->author,
            'text' => $request->text
        ]);

            return redirect()->back();

    }
}