@extends('layouts.app')

@section('title')
    Rooms
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6 mt-3">
            <h2 style="color: white"><i class="fa fa-plus-square-o"></i> Add Room</h2>
            <hr>

            @include('errors.errors')

            <form action="/rooms/store" method="POST">
                @csrf

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Room Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $room->name }}">
                    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>

                <div class="form-group {{ $errors->has('floor') ? 'has-error' : '' }}">
                    <label for="floor">Floor:</label>
                    <select name="floor" class="form-control selectpicker" data-live-search="true" title="Select Floor">
                        <option value="Ground Floor"{{ $room->floor == 'Ground Floor' ? ' selected' : '' }}>Ground Floor</option>
                        <option value="First Floor"{{ $room->floor == 'First Floor' ? ' selected' : '' }}>First Floor</option>
                        <option value="Second Floor"{{ $room->floor == 'Second Floor' ? ' selected' : '' }}>Second Floor</option>
                        <option value="Third Floor"{{ $room->floor == 'Third Floor' ? ' selected' : '' }}>Third Floor</option>
                    </select>
                    <span class="text-danger">{{ $errors->has('floor') ? $errors->first('floor') : '' }}</span>
                </div>

                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type">Type:</label>
                    <select name="type" class="form-control selectpicker" data-live-search="true" title="Select Room Type">
                        <option value="Standard"{{ $room->type == 'Standard' ? ' selected' : '' }}>Standard</option>
                        <option value="Deluxe"{{ $room->type == 'Deluxe' ? ' selected' : '' }}>Deluxe</option>
                        <option value="Family Room"{{ $room->type == 'Family Room' ? ' selected' : '' }}>Family Room</option>
                    </select>
                    <span class="text-danger">{{ $errors->has('type') ? $errors->first('type') : '' }}</span>
                </div>

                <div class="form-group {{ $errors->has('beds') ? 'has-error' : '' }}">
                    <label for="beds">Beds:</label>
                    <select name="beds" class="form-control selectpicker" data-live-search="true" title="Select Room Type">
                        <option value="One Bed"{{ $room->beds == 'One Bed' ? ' selected' : '' }}>One Bed</option>
                        <option value="Two Bed"{{ $room->beds == 'Two Bed' ? ' selected' : '' }}>Two Bed</option>
                        <option value="Triple Bed"{{ $room->beds == 'Triple Bed' ? ' selected' : '' }}>Triple Bed</option>
                    </select>
                    <span class="text-danger">{{ $errors->has('beds') ? $errors->first('beds') : '' }}</span>
                </div>

                <button type="submit" class="btn btn-primary">Add Room</button>
            </form>

        </div>
    </div>

@endsection
