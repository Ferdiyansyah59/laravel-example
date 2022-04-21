@extends('layout.main')

@section('Container')

    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <h1 class="mb-5 mt-3">{{ $post->title }}</h1>
                <p>By <a class="text-decoration-none" href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                @else
                <img src="https://source.unsplash.com/500x300/?{{ $post->category->slug }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <article class="my-3 fs-6">
                    {!! $post->body !!}  {{-- Supaya tag html tetep jalan, jadi tag htmlnya gajadi text biasa --}}
                </article>

                <a class="d-block my-5" href="/posts">Back to posts</a>
            </div>
        </div>
    </div>

@endsection


