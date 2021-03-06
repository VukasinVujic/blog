<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CreatCommentRequest;
use App\Mail\CommentReceived;
use App\Tag;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        
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
        $tags = Tag::all();

        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                'body' => 'required',
                'tags'=>'required|array'
            ]);

          $post = Post::create(
              array_merge(
                request()->all(),['user_id' => auth()->user()->id]
              )
          );

          $post->tags()->attach(request('tags'));

            return redirect()->route('posts.index');
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
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }

    public function addComment(CreatCommentRequest $request, $id)
    {
        $comment = Comment::create([
            'post_id' => $id,
            'author' => $request->author,
            'text' => $request->text
        ]);

        if($comment->post->user){
            \Mail::to($comment->post->user)->send(new CommentReceived(
                $comment->post, $comment
            ));
        }
        return redirect()->back();

    }

    
}
