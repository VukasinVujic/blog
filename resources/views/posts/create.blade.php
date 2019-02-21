@extends('layouts.master')

@section('title', 'Create a post')

@section('content')
<div class="container">
<form method="POST" action="/posts">
    @csrf
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">Title</label>
      <div class="col-8">
        <input id="text" name="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value ="{{ old('title') }}">
        
        @include('partials.invalid-feedback' , ['field' => 'title'])
        
        
      </div>
    </div>
    <div class="form-group row">
      <label for="textarea" class="col-4 col-form-label">Content</label>
      <div class="col-8">
        <textarea id="textarea" name="body" cols="40" rows="5" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" value="{{ old('body')}}"></textarea>
        @include('partials.invalid-feedback', ['field' => 'body'])
        
      </div>
    </div>

    @if (count($tags))
    <div class="form-group row">
        <label for="tags[]" class="col-4 col-form-label">Tags</label>
        <div class="col-8">

          @foreach ($tags as $tag)
              <input type="checkbox" id="tag" name="tags[]" value="{{$tag->id}}"> {{ $tag->name }}
          @endforeach

        </div>
      </div>

        
    @endif

    <div class="form-group row">
      <div class="offset-4 col-8">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
 
</div>

@endsection



{{-- <div class="invalid-feedback">

    @foreach ($errors->get('title') as $error)
    @if ($errors->has('body'))
    {{ $errors->get('body')[0] }}
    @endif    
    @endforeach

  </div> --}}