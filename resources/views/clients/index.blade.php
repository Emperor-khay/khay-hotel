@extends('layouts.app')

@section('title')
    Clients
@endsection

@section('search')
    <form class="navbar-form navbar-left" action="{{ route('clients.search',  ['query' => null]) }}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search In Clients" name="query">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
@endsection

@section('content')
<h2 style="color: white"><i class="fa fa-users"></i>Clients</h2>
<hr>
<a href="/clients/create" class="btn btn-primary">Create</a>
<br><br>

@include('errors.errors')
<table class="table table-bordered table-hover" id="clients" style="background-color: white">
    <thead>
    <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td><img src="{{ url('/uploads').'/'. $client->image }}" width="30px" class="img-thumbnail"></td>
            <td>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to Delete?')">
                    @csrf
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm fa fa-pencil"></a>
                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-success btn-sm fa fa-bars"></a>
                    <button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection
