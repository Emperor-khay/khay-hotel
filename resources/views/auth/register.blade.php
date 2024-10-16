@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')

<h2>Register</h2>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/register" method="post">
    @csrf
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name">Name</label>
        <input type="name" name="name" class="form-control" id="name" placeholder="javed@mail.com">
        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="javed@mail.com">
        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="secret">
        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
    </div>

    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="secret">
        <span class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>

</form>

@endsection
