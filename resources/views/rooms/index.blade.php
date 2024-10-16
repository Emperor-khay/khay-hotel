@extends('layouts.app')

@section('title')
    View Rooms
@endsection

{{-- @section('search')
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search Room">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
@endsection --}}

@section('content')
    <h2 style="color: white"><i class="fa fa-bed"></i> View Rooms</h2>
    <hr>
    @include('errors.errors')
    <table class="table table-bordered table-hover" style="background-color: white">
        <thead>
        <tr>
            <th>#ID</th>
            <th>name</th>
            <th>Type</th>
            <th>Floor</th>
            <th>Beds</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->type }}</td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->beds }}</td>
                <td>
                    @if ($room->status)
                        <span class="label label-primary">Available</span>
                    @else
                        <span class="label label-danger">Not Available</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                            <i class="fa fa-trash"></i>
                        </button>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
