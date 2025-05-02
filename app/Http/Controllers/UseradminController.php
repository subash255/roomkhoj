<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UseradminController extends Controller
{
    public function index()
    {
        // Retrieve users where the 'usertype' column is 'user'
        $users = User::where('usertype', 'user')->get();

        return view('useradmin.index', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('useradmin.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:255',  
            'email' => 'required|email|unique:users,email,' . $id,  // Email should be unique except for the current user
            'photopath' => 'nullable|image|max:2048',  
            'dob' => 'nullable|date', 
            'phonenumber' => 'nullable|string|max:15',  
        ]);

        // Find the user by ID, if not found, return an error
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('useradmin.index')->with('error', 'User not found.');
        }

        
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

        
        $user->update($data);

        // Redirect to user admin index with a success message
        return redirect()->route('useradmin.index')->with('success', 'User updated successfully.');
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        File::delete(public_path('images/users/' . $user->photopath));
        return redirect()->route('useradmin.index')->with('success', 'user deleted successfully.');
    }
}
