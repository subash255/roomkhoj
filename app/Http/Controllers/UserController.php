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
        $room = Rooms::find($id);

      

       
        return view('users.book',compact('room'));
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
        dd($request->all());
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
}
