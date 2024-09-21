<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Rooms::orderBy('id')->get();
      return view('rooms.index',compact('rooms'));
    }
    public function create()
    {
     return view('rooms.create');
    }
    public function edit($id)
    {
      
        $room = Rooms::find($id); 
        
        return view('rooms.edit',compact('room'));

    }
    public function update(Request $request, $id)
    {
    // Validate incoming request data
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'room_no' => 'nullable|integer',
        'photopath' => 'nullable|image',  // Validate image file
    ]);

    // Find the room by ID, if not found, return an error
    $room = Rooms::find($id);
    if (!$room) {
        return redirect()->route('rooms.index')->with('error', 'Room not found.');
    }

    // Set the default photopath to the existing one
    $data['photopath'] = $room->photopath;

    // Check if a new image has been uploaded
    if ($request->hasFile('photopath')) {
        // Create a unique filename for the new image
        $photoname = time() . '.' . $request->photopath->extension();
        
        // Move the new image to the public images directory
        $request->photopath->move(public_path('image/rooms'), $photoname);
        
        // Delete the old image file, but only if it exists
        if (file_exists(public_path('image/rooms/' . $room->photopath))) {
            unlink(public_path('image/rooms/' . $room->photopath));
        }

        // Update the photopath to the new image
        $data['photopath'] = $photoname;
    }

    // Update the room with the new data
    $room->update($data);

    // Redirect to rooms index with a success message
    return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    


public function store(Request $request)
{
     //dd($request->all());
    $data = $request->validate([
        'room_no' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'photopath' => 'required|image',
        'price' => 'required|numeric',
        'stock' => 'required|string'
    ]);
$photoname = time().'.'.$request->photopath->extension();
    $request->photopath->move(public_path('image/rooms'),$photoname);
    
       
        $data['photopath'] = $photoname;
    

    Rooms::create($data);

    return redirect()->route('rooms.index')->with('success', 'Room created successfully.');

     }
 

    public function delete($id)
    {
        $room = Rooms::find($id); 
        $room->delete();
        File::delete(public_path('images/rooms/'.$room->photopath));
        return redirect()->route('rooms.index')->with('success','rooms deleted successfully.');
    }

}