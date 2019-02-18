@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    <h2 class="blog-post-title">Register</h2>

    <form method="POST" action="{{ route('register') }}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"/>
            @include('partials.error-message', ['fieldTitle' => 'name'])
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"/>
            @include('partials.error-message', ['fieldTitle' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"/>
            @include('partials.error-message', ['fieldTitle' => 'password'])
        </div>

          <div class="form-group">
            <label for="age">age</label>
            <select name="age" id="age" class="form-control">
                @for ($i = 1; $i <= 100; $i++)
                    <option value="{{ $i }}">{{ $i }} </option>
                @endfor  
            </select>  
            @include('partials.error-message', ['fieldTitle' => 'age'])
            </div>
     </div>


        @if ($message = session('message'))
       
                <div class="alert alert-danger" role="alert">
                {{ $message }}
                </div>

        @endif

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>



    </form>
@endsection