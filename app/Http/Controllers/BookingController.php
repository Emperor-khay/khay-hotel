<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Client;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $booking = new Booking();
        $clients = Client::all();
        $rooms = Room::where('status', 1)->get();
        return view('bookings.create', compact('clients', 'rooms', 'booking'));
    }

    public function store(Request $request)
    {
        // Validate the Form
        $request->validate([
            'client_id' => 'required',
            'room_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // Save into Database
        Booking::create([
            'client_id' => $request->client_id,
            'room_id' => $request->room_id,
            'user_id' => auth()->user()->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Update Rooms status
        $room = Room::find($request->room_id);
        $room->status = 0;
        $room->save();

        return redirect('/bookings')->with('msg', 'The Room has been booked successfully');
    }


    public function show($id)
    {
        $booking = Booking::find($id);
        return view('bookings.detail', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        $rooms = Room::all();
        $clients = Client::all();
        return view('bookings.edit', compact('booking', 'clients', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());
        return redirect('/bookings')->with('msg', 'Booking details has been updated');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect('/bookings')->with('msg', 'Booking detail has been deleted successfully');
    }

    public function cancel($id) {
        $booking = Booking::find($id);
        $room = Room::find($id);
        $booking->status = 0;
        $booking->user_id = auth()->id();
        $booking->save();
        $room->status = 1;
        $room->save();
        return redirect('/bookings')->with('msg', 'Booking has been cancelled');
    }

    public function canceledBookings() {
        $canceledBookings = Booking::where('status', 0)->get();
        return view('bookings.canceled', compact('canceledBookings'));
    }

}
