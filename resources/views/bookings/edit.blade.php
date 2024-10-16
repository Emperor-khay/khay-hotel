@extends('layouts.app')

@section('title')
    Edit Booking
@endsection

@section('content')
    <h2><i class="fa fa-pencil"></i> Edit Booking</h2>
    <hr>
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}

        <div class="form-group">
            <label for="client">Client:</label>
            <select class="selectpicker form-control" data-live-search="true" title="" name="client_id">
                @foreach ($clients as $client)
                    <option data-subtext="{{ $client->name }}" value="{{ $client->id }}">Client ID:{{ $client->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="room">Room:</label>
            <select class="selectpicker form-control" data-live-search="true" title="" name="room_id">
                @foreach ($rooms as $room)
                    <option data-subtext="{{ $room->name }}" value="{{ $room->id }}">Room ID:{{ $room->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" class="form-control datepicker" value="{{ $booking->start_date }}">
            <span class="text-danger">{{ $errors->has('start_date') ? $errors->first('start_date') : '' }}</span>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" class="form-control datepicker" value="{{ $booking->end_date }}">
            <span class="text-danger">{{ $errors->has('end_date') ? $errors->first('end_date') : '' }}</span>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/bookings') }}" class="btn btn-success">Back</a>
    </form>

@endsection
