<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    $user=User::find($id);
    return view('useradmin.edit',compact('user'));
}
// public function update(Request $request, $id)
// {
//     // Find the user or fail if not found
//     $user = User::findOrFail($id);

//     // Validate user input
//     $data = $request->validate([
//         'name' => 'required|string|max:255',  // Name is required
//         'email' => 'required|email|unique:users,email,' . $user->id,  // Email should be unique except for the current user
//         'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Photo is optional, max size 2MB
//         'dob' => 'nullable|date',  // Optional date of birth
//         'phonenumber' => 'nullable|string|max:15',  // Optional phone number
//     ]);

//     // If a new profile photo is uploaded, process it
//     if ($request->hasFile('photopath')) {
//         // Generate a unique name for the new photo
//         $photoname = time() . '.' . $request->photopath->extension();

//         // Move the new photo to the public/images/users directory
//         $request->photopath->move(public_path('images/users'), $photoname);

//         // Delete the old photo if it exists
//         if ($user->photopath && file_exists(public_path('images/users/' . $user->photopath))) {
//             unlink(public_path('images/users/' . $user->photopath));
//         }

//         // Update the photopath in the validated data array
//         $data['photopath'] = $photoname;
//     } else {
//         // If no new photo is uploaded, retain the old photo path
//         $data['photopath'] = $user->photopath;
//     }

//     // Update the user's record with the validated data
//     $user->update($data);

//     // Redirect back to the user list with a success message
//     return redirect()->route('useradmin.index')->with('success', 'User updated successfully.');
// }
public function update(Request $request, $id)
    {
        // dd($request->all());
    // Validate incoming request data
    $data = $request->validate([
        'name' => 'required|string|',  // Name is required
        'email' => 'required|email|unique:users,email,' ,  // Email should be unique except for the current user
        'photopath' => 'nullable|image',  // Photo is optional, max size 2MB
        'dob' => 'nullable|date',  // Optional date of birth
        'phonenumber' => 'nullable|string|',  // Optional phone number
    ]);

    // Find the user by ID, if not found, return an error
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('useradmin.index')->with('error', 'user not found.');
    }

    // Set the default photopath to the existing one
    $data['photopath'] = $user->photopath;

    // Check if a new image has been uploaded
    if ($request->hasFile('photopath')) {
        // Create a unique filename for the new image
        $photoname = time() . '.' . $request->photopath->extension();
        
        // Move the new image to the public images directory
        $request->photopath->move(public_path('image/users'), $photoname);
        
        // Delete the old image file, but only if it exists
        if (file_exists(public_path('image/users/' . $user->photopath))) {
            unlink(public_path('image/users/' . $user->photopath));
        }

        // Update the photopath to the new image
        $data['photopath'] = $photoname;
    }

    // Update the room with the new data
    $user->update($data);

    // Redirect to rooms index with a success message
    return redirect()->route('useradmin.index')->with('success', 'Room updated successfully.');
    }
    


}
