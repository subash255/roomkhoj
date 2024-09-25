<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Selectpayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectpaymentController extends Controller
{
    public function store(Request $request)
{
    // Validate the incoming request
    $data = $request->validate([
        'room_id' => 'required|exists:rooms,id', // Ensure room_id exists in the rooms table
    ]);

    // Fetch the room details using the provided room_id
    $room = Rooms::findOrFail($data['room_id']); // Ensure the room exists
    $user = auth()->user(); // Get the authenticated user

    // Prepare data for payment selection
    $selectpaymentdata = [
        'user_id' => $user->id, // User ID
        'name' => $user->name,  // User name
        'email' => $user->email, // User email
        'room_id' => $room->id, // Room ID
        'room_name' => $room->name, // Room name
        'price' => $room->price, // Room price
        'photopath' => $room->photopath, // Room photo path
    ];

    // Create the cart entry
    $created = Selectpayment::create($selectpaymentdata);

    // Check if data is created successfully
    if ($created) {
        return redirect()->route('users.selectpayment', ['id' => $room->id])
                         ->with('success', 'Room successfully added.');
    } else {
        return redirect()->back()->with('error', 'Failed to add room to the cart.');
    }
}



    
    

    public function selectpayment($id)
    {
        $paymentMethods = [
            ['id' => 1, 'name' => 'eSewa', 'icon' => 'fab fa-cc-esewa'],
            ['id' => 2, 'name' => 'PayPal', 'icon' => 'fab fa-cc-paypal'],
            ['id' => 3, 'name' => 'Bank Transfer', 'icon' => 'fas fa-university'],
            ['id' => 4, 'name' => 'Credit Card', 'icon' => 'fas fa-credit-card'],
        ];
        
        $user = Auth::user();

        // Fetch the currently selected room
        $room = Rooms::findOrFail($id); // Use findOrFail to ensure the room exists
        $selectpayments = Selectpayment::where('user_id', $user->id)
        ->where('room_id', $room->id) // Assuming you have the $roomId variable defined
        ->get();
       

        return view('users.selectpayment', compact('user', 'selectpayments', 'paymentMethods', 'room'));
    }

}
