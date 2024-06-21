<?php

namespace App\Http\Controllers;


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

    }
    public function update(Request $request ,$id)
    {
        {
            $data = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|integer',
                'stock' => 'required|integer',
                'room_no' => 'required',
                'photopath' => 'image',
            ]);
            $room = Rooms::find($id);
            $data['photopath'] = $room->photopath;
            if($request->hasFile('photopath')){
                $photoname = time().'.'.$request->photopath->extension();
                $request->photopath->move(public_path('images/rooms'), $photoname);
                //delete old photo
                File::delete(public_path('images/rooms/'.$room->photopath));
                // unlink(public_path('images/products/'.$product->photopath));
                $data['photopath'] = $photoname;
            }
            $room->update($data);
            return redirect()->route('rooms.index')->with('success','Product updated successfully.');
        }

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
        File::delete(public_path('images/rooms/'.$room->photopath));
        $room->delete();
        return redirect()->route('rooms.index')->with('success','rooms deleted successfully.');
    }

}