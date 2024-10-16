@extends('layouts.app')

@section('title')
    {{ $client->name }} Detail
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        <h2 style="color: white"><i class="fa fa-user"></i> Client Detail</h2>
        <hr>

        <h3 style="color: white"><i class="fa fa-user-circle-o"></i> Personal Details</h3>
        <table class="table table-hover table-striped table-bordered mt-1" style="background-color: white">
            <tr>
                <th>#Client ID</th>
                <td>{{ $client->id }}</td>
                <th class="text-center">Photo</th>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $client->name }}</td>
                <td rowspan="6"><img src="{{ asset('uploads/'.$client->image) }}" alt=""
                                     class="img img-responsive"
                                     style="width: 150px; margin: 30px auto;"></td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $client->email }}</td>
            </tr>

            <tr>
                <th>Phone</th>
                <td>{{ $client->phone }}</td>
            </tr>

            <tr>
                <th>Registered At</th>
                <td>{{ $client->created_at->diffForHumans() }}</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td>{{ $client->updated_at->diffForHumans() }}</td>
            </tr>
        </table>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
            @csrf

            <a href="/clients" class="btn btn-success btn-sm">Back</a>
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Edit</a>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>

            <hr>
            <h3 style="color: white"><i class="fa fa-calendar"></i> Booking Details</h3>

            @if (!empty($bookings))
                <table class="table table-hover table-striped table-bordered mt-1" style="background-color: white">
                    <thead>
                    <tr>
                        <th>#Booking ID</th>
                        <th>Room</th>
                        <th>Booked At</th>
                        <th>Left At</th>
                        <th>Booked By</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td><a href="/room/{{ $booking->room->id }}">{{ $booking->room->name }}</a></td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>{{ $booking->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2>{{ $client->name }} has not booked rooms yet</h2>
            @endif
        </form>
    </div>
</div>
@endsection
