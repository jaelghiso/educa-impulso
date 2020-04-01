@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 mx-auto">
            <h3 class="mt-4"> {{ $post->title }} 
                <span class="lead">by <span class="text-primary"> {{ $post->user->name }}</span></span>
            </h3>
            <h5 class="mt-2"> {{ $post->subtitle }}</h5>
            <hr>
            <p>Posteado {{ $post->created_at->diffForHUmans() }} </p>
            <hr>
            <img src=" {!! !empty($post->image) ? '/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " alt="image post" class="img-fluid rounded align-items-center">
            <hr>
            <div>
                <p class="lead"> {{ $post->body }}</p>
                <hr>
                <br>
            </div>
            @auth
                <Comments
                    :post-id = '@json($post->id)'
                    :user-name = '@json(auth()->user()->name)'>
                </Comments>
            @endauth
        </div>
    </div>
    
@endsection