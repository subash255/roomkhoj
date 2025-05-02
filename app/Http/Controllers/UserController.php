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
        $user = Auth::user('id');
        // Fetch only available rooms, limit to 6
        $rooms = Rooms::where('status', 'available')->take(6)->get();
        return view('users.index', compact('user', 'rooms'));
    }

    public function about()
    {
        $user = Auth::user();
        return view('users.about', compact('user'));
    }

    public function book($id)
    {
        $user = Auth::user();

        // Fetch the specific room by ID, make sure it's available
        $room = Rooms::where('status', 'available')->findOrFail($id);
    
        // Fetch related rooms based on the same name and available, excluding the current room
        $relatedRooms = Rooms::where('name', $room->name)
                             ->where('status', 'available')
                             ->where('id', '!=', $id)
                             ->get();
    
        // Fetch or create a book record for this room and user
        $book = Books::where('room_id', $room->id)->where('user_id', $user->id)->first();
    
        return view('users.book', compact('user', 'room', 'relatedRooms', 'book'));
    }
    
    public function profile($id)
    {
        $user = Auth::user();  
        return view('users.profile', compact('user'));
    }
    public function profileindex(){
        $user =Auth::user();
        return view('users.profile.content',compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'photopath' => 'nullable|image|max:2048',
            'dob' => 'nullable|date',
            'phonenumber' => 'nullable|string|max:15',
        ]);

        $user = User::find($id);
        
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('image/users'), $photoname);

            if ($user->photopath && file_exists(public_path('image/users/' . $user->photopath))) {
                unlink(public_path('image/users/' . $user->photopath));
            }

            $data['photopath'] = $photoname;
        } else {
            $data['photopath'] = $user->photopath;
        }

        $user->update($data);

        return redirect()->route('users.profile', $user->id)->with('success', 'User updated successfully.');
    }

    public function search(Request $request)
    {
        $user = Auth::user();

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

        $name = $validated['name'];
        $min_price = $validated['min_price'] ?? null;
        $max_price = $validated['max_price'] ?? null;

        $query = Rooms::query()->where('status', 'available');

        if ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }

        if ($min_price !== null) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price !== null) {
            $query->where('price', '<=', $max_price);
        }

        $properties = $query->get();

        return view('users.search', compact('properties','user'));
    }

    public function showroom()
    {
        $user = Auth::user();  

        // Group rooms by name and filter only available ones
        $rooms = Rooms::where('status', 'available')->get()->groupBy('name')->sortKeys();

        $threeRooms = $rooms->flatMap(function ($roomGroup) {
            return $roomGroup->take(1); 
        })->take(3);
       
        return view('users.showroom', compact('user', 'rooms', 'threeRooms'));
    }

    public function moreroom(Request $request)
    {
        $user = Auth::user();  
        $name = $request->input('name');

        // Fetch rooms based on location and availability
        $rooms = Rooms::where('name', $name)->where('status', 'available')->get(); 

        return view('users.moreroom', compact('user', 'rooms', 'name'));
    }

    public function booking()
    {
        $user = Auth::user();

        // Fetch all bookings made by the user
        $rooms = books::where('user_id', $user->id)->with('room')->get();

        
        return view('users.room', compact('user', 'rooms'));
    }
}
