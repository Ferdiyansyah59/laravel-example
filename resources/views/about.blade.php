@extends('layout.main')

@section('Container')
    <h3>{{ $post["name"] }}</h3>
    <h5>{{ $post["age"] }}</h5>
    <img style="height: 200px" src="img/{{ $post["img"] }}" alt="{{ $post["name"] }}">

    
@endsection