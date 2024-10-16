@extends('layouts.app')

@section('title')
    Booking
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6 mt-3">
            <h2><i class="fa fa-calendar-plus-o"></i> Book A Room</h2>
            <hr>

            @include('errors.errors')

            <form action="/bookings/store" method="POST">
                @csrf

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
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" class="form-control datepicker" value="{{ $booking->end_date }}">
                </div>
                <button type="submit" class="btn btn-primary">Book Room</button>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script>
        $('input.datepicker').Zebra_DatePicker({});
    </script>
@endsection
