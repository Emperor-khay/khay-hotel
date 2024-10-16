@extends('layouts.app')

@section('title')
    Edit Client
@endsection

@section('content')
<h1 style="color: white"><i class="fa fa-pencil"></i> Edit Client</h1>
<div class="row">
    <div class="col-md-8">

        @include('errors.errors')

        @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif

        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}

            <div class="form-group">
                <label for="name">Client Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $client->name) }}" placeholder="Client Name">
                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="email">Client Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $client->email) }}" placeholder="Client Email">
                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="phone">Client Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $client->phone) }}" placeholder="Client Phone">
                <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="image">Client Image</label>
                <input type="file" name="image" id="image" class="form-control">
                <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                <div id="thumb-output"></div>
            </div>

            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
                <a href="/clients" class="btn btn-success">Back to Clients</a>
            </div>
        </form>

    </div>
    <div class="col-md-4"></div>
</div>
@endsection
