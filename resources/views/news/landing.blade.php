@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 mx-auto">
                <h1 class="my-4 text-center">Noticias</h1>

                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <img src=" {!! !empty($post->image) ? '/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " alt="post image" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title text-center">{{ $post->title }}</h2>
                            <p class="card-text"> {{ Str::limit ($post->subtitle, $length=70, '...') }}</p>
                            <a href="news/posts/{{ $post->id }}" class="btn btn-primary">Leer más &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posteado {{ $post->created_at->diffForHumans() }} por
                            <span class="text-primary">{{ $post->user->name }}</span>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
    
@endsection