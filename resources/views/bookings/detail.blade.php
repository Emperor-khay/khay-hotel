@extends('layouts.app')

@section('title')
    {{$booking->name}} Detail
@endsection

@section('content')

    <h2><i class="fa fa-table"></i> Room Detail</h2>
    <hr>

    <table class="table table-bordered table-striped">
        <tr>
            <th>#Booking ID</th>
            <td>{{ $booking->client->id }}</td>
        </tr>

        <tr>
            <th>Client Name</th>
            <td>{{ $booking->client->name }}</td>
        </tr>

        <tr>
            <th>Room</th>
            <td>{{ $booking->room->id }}</td>
        </tr>

        <tr>
            <th>Floor</th>
            <td>{{ $booking->room->floor }}</td>
        </tr>

        <tr>
            <th>Type</th>
            <td>{{ $booking->room->type }}</td>
        </tr>

        <tr>
            <th>Last Update By:</th>
            <td>{{ $booking->user->name }}</td>
        </tr>

        <tr>
            <th>Booking At</th>
            <td>{{ $booking->start_date }}</td>
        </tr>

        <tr>
            <th>Booking End</th>
            <td>{{ $booking->end_date }}</td>
        </tr>

    </table>

    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
        @csrf

        <a href="{{ url('/bookings') }}" class="btn btn-success btn-sm">Back</a>
        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-info btn-sm">Edit</a>
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
    </form>

@endsection
