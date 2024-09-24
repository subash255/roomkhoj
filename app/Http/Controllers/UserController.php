<?php
namespace App\Models\User;

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user=Auth::user('id');
        $rooms=Rooms::all()->take(6);
    return view('users.index',compact('user','rooms'));
    }
    public function about()
    {
        $user=Auth::user();
        return view('users.about',compact('user'));
    }

    public function book($id)
    {
        
        $user = Auth::user();

        // Fetch the specific room by ID
        $room = Rooms::findOrFail($id);
    
        // Fetch related rooms based on the same location, excluding the current room
        $relatedRooms = Rooms::where('name', $room->name)
                             ->where('id', '!=', $id)
                             ->get();
    
        // You can either fetch or create a book record for this room and user
        $book = Books::where('room_id', $room->id)->where('user_id', $user->id)->first();
    
        // Return the booking view with the room, related rooms, and specific book data
        return view('users.book', compact('user', 'room', 'relatedRooms', 'book'));
    }
    
    public function profile($id)
    {
        $user=Auth::user();  
         return view('users.profile', compact('user'));
    }
    public function room($id)
    {
        

    }
    public function edit()
    {
        $user=Auth::user();
        return view('users.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:255',  // Name is required
            'email' => 'required|email|unique:users,email,' . $id,  // Email should be unique except for the current user
            'photopath' => 'nullable|image|max:2048',  // Photo is optional, max size 2MB
            'dob' => 'nullable|date',  // Optional date of birth
            'phonenumber' => 'nullable|string|max:15',  // Optional phone number
        ]);

        // Find the user by ID, if not found, return an error
        $user = User::find($id);
        

        // Check if a new image has been uploaded
        if ($request->hasFile('photopath')) {
            // Create a unique filename for the new image
            $photoname = time() . '.' . $request->photopath->extension();

            // Move the new image to the public images directory
            $request->photopath->move(public_path('image/users'), $photoname);

            // Delete the old image file, but only if it exists
            if ($user->photopath && file_exists(public_path('image/users/' . $user->photopath))) {
                unlink(public_path('image/users/' . $user->photopath));
            }

            // Update the photopath to the new image
            $data['photopath'] = $photoname;
        } else {
            // If no new image is uploaded, keep the existing one
            $data['photopath'] = $user->photopath;
        }

        // Update the user with the new data
        $user->update($data);

        // Redirect to user admin index with a success message
        return redirect()->route('users.profile',$user->id)->with('success', 'User updated successfully.');
    }
    public function search(Request $request)
    {
        // Validate the request inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'min_price' => 'nullable|integer|min:0',
            'max_price' => 'nullable|integer|min:0',
        ], [
            'name.required' => 'Location is required',
            'name.max' => 'Location must not exceed 255 characters',
            'min_price.integer' => 'Minimum price must be a valid number',
            'min_price.min' => 'Minimum price must be at least 0',
            'max_price.integer' => 'Maximum price must be a valid number',
            'max_price.min' => 'Maximum price must be at least 0',
        ]);
    
        // Extract values from the validated data
        $name = $validated['name'];
        $min_price = $validated['min_price'] ?? null;
        $max_price = $validated['max_price'] ?? null;
    
        // Build the query
        $query = Rooms::query();
    
        // Apply filters
        if ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
    
        if ($min_price !== null) {
            $query->where('price', '>=', $min_price);
        }
    
        if ($max_price !== null) {
            $query->where('price', '<=', $max_price);
        }
    
        // Get the filtered properties
        $properties = $query->get();
    
        // Return the view with the filtered properties
        return view('users.search', compact('properties'));
    }
    
    public function showroom()
    {
        $user=Auth::user();  

        $rooms = Rooms::all()->groupBy('name')->sortKeys(); 
        // $shows=Rooms::where('name', $rooms->name)->get();
        $threeRooms = $rooms->flatMap(function ($roomGroup) {
            return $roomGroup->take(1); // Change this if you want to take more from each group
        })->take(3);
       
         return view('users.showroom', compact('user','rooms', 'threeRooms'));
    }
    public function moreroom(Request $request)
{
    $user = Auth::user();  
    $name= $request->input('name');  // Get the location from the request

    // Fetch rooms based on the location
    $rooms = Rooms::where('name', $name)->get(); 

    return view('users.moreroom', compact('user', 'rooms','name'));
}
}
