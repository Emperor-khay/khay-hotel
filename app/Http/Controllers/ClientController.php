<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Booking;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Find All clients and passing to clients
        $clients = Client::all();
        // Redirect to Clients page
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        // Instance of Client
        $client = new Client();
        // Redirect to client page, along with passing client object into Array
        return view('clients.create', compact('client'));
    }

    public function store(Request $request)
    {
        // Validate the form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'image' => 'required|image'
        ]);

        // Check if there is any file
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move("uploads", $image->getClientOriginalName());
        }

        // Store into Database
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image->getClientOriginalName()
        ]);
        return redirect('/clients')->with('msg', 'Client has been added');

    }

    public function show($id)  {
        // Find the client
        $client = Client::find($id);
        // Get a specific booking
        $bookings = Booking::where('client_id', $id)->get()->all();

        // Return back to client details
        return view('clients.detail', compact('client', 'bookings'));
    }

    public function edit($id) {
        // Find the client
        $client = Client::find($id);
        // Redirect to Edit client
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        // Find the client
        $client = Client::find($id);

        // Validate the form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Check if there is any image,
        if ($request->hasFile('image')) {
            // Check if file exists
            if (file_exists(public_path('uploads/') . $client->image)) {
                // Delete an old image
                unlink(public_path('uploads/') . $client->image);
            }
            // Get and Upload new image
            $image = $request->image;
            $image->move("uploads", $image->getClientOriginalName());
            $client->image = $request->image->getClientOriginalName();
        }
        // Updating Clients
        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $client->image,
        ]);
        return redirect('/clients')->with('msg', 'Client has been updated');
    }

    public function destroy($id)
    {
        // Find the client
        Client::destroy($id);
        return redirect('/clients')->with('msg', 'Client has been deleted');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $clients = Client::where('name', 'LIKE', "%$query%")
                            ->orWhere('email', 'LIKE', "%$query%")
                            ->orWhere('phone', 'LIKE', "%$query%")
                            ->get();
        } else {
            $clients = Client::all();
        }

        return view('clients.index', compact('clients'))->render();
    }
}
