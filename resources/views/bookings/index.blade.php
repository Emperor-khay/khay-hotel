@extends('layouts.app')

@section('title')
    View Rooms
@endsection

@section('content')
    <h2><i class="fa fa-calendar"></i> View Bookings</h2>
    <hr>

    @include('errors.errors')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#Booking ID</th>
            <th>Client Name</th>
            <th>Room</th>
            <th>Floor</th>
            <th>Beds</th>
            <th>Type</th>
            <th>Booked At</th>
            <th>Booking End</th>
            <th>Booked By</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td><a href="client/{{ optional($booking->client)->id }}">{{ optional($booking->client)->name }}</a></td>
                <td>{{ optional($booking->room)->name }}</td>
                <td>{{ optional($booking->room)->floor }}</td>
                <td>{{ optional($booking->room)->beds }}</td>
                <td>{{ optional($booking->room)->type }}</td>
                <td>{{ $booking->start_date }}</td>
                <td>{{ $booking->end_date }}</td>
                <td>{{ optional($booking->user)->name }}</td>
                <td>
                    @if ($booking->status)
                        <label class="label label-primary text-xs">Booked <i class="fa fa-check"></i></label>
                    @else
                        <label class="label label-warning text-xs">Canceled <i class="fa fa-ban"></i></label>
                    @endif
                </td>
                <td>
                    <div class="input-group">
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                            @csrf

                            <a href="{{ route('bookings.edit', $booking->id) }}" class="fa fa-pencil btn btn-primary btn-xs" title="Edit Booking"></a>
                            <a href="{{ route('bookings.show', $booking->id) }}" class="fa fa-bars btn btn-success btn-xs" title="Show Booking Details"></a>
                            <button type="submit" class="btn btn-danger btn-xs fa fa-trash" onclick="return confirm('Are you sure you want to delete this?')" title="Delete Booking"></button>
                        </form>

                        <form action="{{ route('bookings.cancel', [$booking->id, $booking->room_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-xs fa fa-times-circle col-md-12" onclick="return confirm('Are you sure you want to Cancel Booking?')" title="Cancel Booking" style="margin-top: 5px"></button>
                        </form>

                    </div>

                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
