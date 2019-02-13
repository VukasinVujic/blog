

@extends('layouts.master')

@section('title', $post->title)

@section('content')

<div>
        
    <h1> {{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>

    @foreach ($post->comments as $comment)
    
    <div class="p-4 alert alert-success">
        <div class="text-muted"> {{ $comment->created_at }} </div>

        <strong> {{ $comment->text }} says: </strong> {{ $comment->text }}
    </div>
        @endforeach

        <div class="container">
                <form method="POST" action="{{ route('posts.comment', ['id' =>$post->id])}}">
                  @csrf
                    <div class="form-group row">
                    <label for="text" class="col-4 col-form-label">Author</label>
                    <input
                      id="text"
                      name="author"
                      type="text"
                      class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}"
                      
                    />
        @include('partials.invalid-feedback' , ['field' => 'author'])

                  </div>
            
                  <div class="form-group row">
                    <label for="textarea" class="col-4 col-form-label">Content</label>
                    <textarea
                      id="textarea"
                      name="text"
                      cols="40"
                      rows="5"
                      class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"></textarea>
        @include('partials.invalid-feedback' , ['field' => 'text'])

                  </div>
                
                  <div class="form-group row">
                        <div class="offset-4 col-8">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                
                </form>
              </div>

              
    
</div>


@endsection



