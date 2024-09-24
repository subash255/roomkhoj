<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Selectpayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectpaymentController extends Controller
{
    public function store(Request $request, $id)
    {
        // Validate the incoming request
        $data = $request->validate([
            'room_id' => 'required|exists:rooms,id', // Check if room_id exists in the rooms table
        ]);
    
        // Fetch the room details using the provided room_id
        $room = Rooms::findOrFail($data['room_id']); // Make sure the room exists
        $user = auth()->user(); // Get the authenticated user
    
        // Prepare the data to be stored in the cart
        $selectpaymentdata = [
            'user_id' => $user->id, // User ID
            'name' => $user->name,  // User name
            'email' => $user->email, // User email
            'room_id' => $room->id, // Room ID
            'room_name' => $room->name, // Room name
            'price' => $room->price, // Room price
            'photopath' => $room->photopath, // Room photo path
        ];
    
        // Check if the room is already in the user's cart
        $check = Selectpayment::where('user_id', $user->id)
                     ->where('room_id', $room->id)
                     ->first();
    
        
        // Create the cart entry
        Selectpayment::create($selectpaymentdata);
    
        // Redirect back with success message
        return redirect()->route('users.selectpayment', ['id' => $room->id]);
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
        $selectpayments = Selectpayment::where('user_id', $user->id)->get();
       

        return view('users.selectpayment', compact('user', 'selectpayments', 'paymentMethods', 'room'));
    }

}
