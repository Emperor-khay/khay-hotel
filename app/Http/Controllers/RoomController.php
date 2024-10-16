<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $room = new Room();
        return view('rooms.create', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'floor' => 'required',
            'type' => 'required',
            'beds' => 'required'
        ]);

        Room::create($request->all());
        return redirect('/rooms')->with('msg', 'Room creted successfully');
    }

    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.detail', compact('room'));
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'floor' => 'required',
            'type' => 'required',
            'beds' => 'required'
        ]);

        $room = Room::find($id);
        $room->update($request->all());
        return redirect('/rooms')->with('msg', 'Room updated Successfully');
    }

    public function destroy(Room $room)
    {
        Room::destroy($room->id);
        return redirect('rooms')->with('msg', 'Room deleted successfully');
    }
}
