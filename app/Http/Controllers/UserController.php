<?php
namespace App\Models\User;

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user=Auth::user('id');
        $rooms=Rooms::all();
    return view('users.index',compact('user','rooms'));
    }

    public function book($id)
    {
        // Fetch the specific room by ID
        $room = Rooms::findOrFail($id); // Using findOrFail to handle non-existing rooms

        // Fetch related rooms based on the same location, excluding the current room
        $relatedRooms = Rooms::where('name', $room->name)
                             ->where('id', '!=', $id)
                             ->get();

        // Return the booking view with the room and related rooms data
        return view('users.book', compact('room', 'relatedRooms'));
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
       // dd($request->all());
        $user = User::find($id);
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photopath' => 'image',
            'dob' => 'required',
            'phonenumber' => 'required',
        ]);
        $data['photopath'] = $user->photopath;
        if($request->hasFile('photopath')){
            $photoname = time().'.'.$request->photopath->extension();
            $request->photopath->move(public_path('images/users'), $photoname);
            unlink(public_path('images/users/'.$user->photopath));
            $data['photopath'] = $photoname;
        }

        
            $user->update($data);
        
        return redirect()->route('users.index')->with('success','User updated successfully.');
    }
    public function search(Request $request)
    {
        // Get filter values from the request
        $location = $request->input('location');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        // Build the query
        $query = Rooms::query();

        // Apply filters
        if ($location) {
            $query->where('name', 'LIKE', "%{$location}%");
        }

        if ($min_price) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price) {
            $query->where('price', '<=', $max_price);
        }

        // Get the filtered properties
        $properties = $query->get();

        // Redirect to another page showing the results
        return view('users.search', compact('properties'));
    }
}
