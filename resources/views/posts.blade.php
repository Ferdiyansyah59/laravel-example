@extends('layout.main')

@section('Container')

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">     
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ request('search') }}" placeholder="Search" name="search">
                    <button class="btn btn-danger" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($post->count())    
        <div class="card mb-3">
            @if ($post[0]->image)
            <div style="max-height: 400px; overflow: hidden;"> <!-- Overflow itu kl misalnya bablas ngelebihin max-height nya -->
                <img src="{{ asset('storage/'.$post[0]->image) }}" class="img-fluid" alt="{{ $post[0]->category->name }}">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->slug }}" class="card-img-top" alt="{{ $post[0]->category->name }}">
            @endif
            
            <div class="card-body text-center">
                <h3 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $post[0]->slug }}">{{ $post[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        By <a class="text-decoration-none" href="/posts?user={{ $post[0]->user->username }}">{{ $post[0]->user->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $post[0]->category->slug }}">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $post[0]->excerpt }}</p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $post[0]->slug }}">Read more</a>
            </div>
        </div>   
        <div class="container">
            <div class="row">
                @foreach ($post->skip(1) as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="height: 35rem">
                            <div class="position-absolute bg-warning px-3 py-2">
                                <a class="text-decoration-none text-white fs-6" href="/posts?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                            </div>
                            @if ($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}" class="img-fluid" alt="{{ $item->category->name }}">
                            @else
                            <img src="https://source.unsplash.com/500x300/?{{ $item->category->slug }}" class="card-img-top" alt="{{ $item->category->name }}">
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none text-dark" href="/posts/{{ $item->slug }}">{{ $item->title }}</a></h5>
                                <p>
                                    <small class="text-muted">
                                        By <a class="text-decoration-none" href="/posts?user={{ $post[0]->user->username }}">{{ $post[0]->user->name }}</a>{{ $post[0]->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $item->excerpt }}</p>
                                <a href="/posts/{{ $item->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>  

    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $post->links() }}
    </div>
@endsection