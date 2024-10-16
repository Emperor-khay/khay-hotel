<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Client;
use App\Models\Booking;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $client = new Client();
        $room = new Room();
        $booking  = new Booking();
        return view('dashboard', compact('client', 'room', 'booking'));
    }
}
