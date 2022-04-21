@extends('layout.main')

@section('Container')
<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="form-floating mb-2">
                <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Your Name">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="form-floating mb-2">
                <input type="text" name="username" required class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" placeholder="Yout Username">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="name@example.com">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </form>
        <small class="d-block text-center mt-3">Have account? <a href="/login">Login</a></small>
      </main>
  </div>
</div>
@endsection