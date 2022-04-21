@extends('dashboard.layouts.main')

@section('Container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="mb-5 mt-3">{{ $posts->title }}</h1>

                <a class="btn btn-success" href="/dashboard/posts"><span data-feather="arrow-left"></span>Back to all my posts</a>
                <a class="btn btn-warning" href="/dashboard/posts/{{ $posts->slug }}/edit"><span data-feather="edit"></span>Edit</a>
                <form class="d-inline" action="/dashboard/posts/{{ $posts->slug }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Aare you sure?')"><span data-feather="x-circle"></span>Delete</button>
                 </form>
                
                 @if ($posts->image)
                 <div style="max-height: 600px; overflow: hidden;"> <!-- Overflow itu kl misalnya bablas ngelebihin max-height nya -->
                     <img src="{{ asset('storage/'.$posts->image) }}" class="img-fluid mt-2" alt="{{ $posts->category->name }}">
                 </div>
                 @else
                 <img src="https://source.unsplash.com/1200x600?{{ $posts->category->slug }}" class="img-fluid mt-2" alt="{{ $posts->category->name }}">
                 @endif
                <article class="my-3 fs-6">
                    {!! $posts->body !!}  {{-- Supaya tag html tetep jalan, jadi tag htmlnya gajadi text biasa --}}
                </article>
            </div>
        </div>
    </div>
@endsection
