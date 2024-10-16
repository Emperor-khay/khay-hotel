@extends('layouts.app')

@section('title')
    {{$room->name}} Detail
@endsection

@section('content')

    <h2><i class="fa fa-table"></i> Room Detail</h2>
    <hr>

    <table class="table table-bordered table-striped">

        <tr>
            <th>#ID</th>
            <td>{{ $room->id }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $room->name }}</td>
        </tr>

        <tr>
            <th>Type</th>
            <td>{{ $room->type }}</td>
        </tr>

        <tr>
            <th>Floor</th>
            <td>{{ $room->floor }}</td>
        </tr>

        <tr>
            <th>Type</th>
            <td>{{ $room->type }}</td>
        </tr>

        <tr>
            <th>Registered At</th>
            <td>{{ $room->created_at->diffForHumans() }}</td>
        </tr>

        <tr>
            <th>Last update</th>
            <td>{{ $room->updated_at->diffForHumans() }}</td>
        </tr>

    </table>

    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
        @csrf
        <a href="{{ url('/rooms') }}" class="btn btn-success btn-sm">Back</a>
        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-info btn-sm">Edit</a>
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
    </form>

@endsection
