<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //dd ($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
            'photopath' => 'required|image',
            'dob' => 'required',
            'phonenumber' => 'required',
        ]);
        
        // Handle the file upload first
        $photoname = time() . '.' . $request->photopath->extension();
        $request->photopath->move(public_path('image/users'), $photoname);
        
        // Create the user after file is moved
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photopath' => $photoname, // Store the correct photo file name
            'dob' => $request->dob,
            'phonenumber' => $request->phonenumber,
        ]);
        
        // Fire event and authenticate the user
        event(new Registered($user));
        Auth::login($user);
        
        // Redirect to the desired page after registration
        return redirect(route('login', absolute: false));
        
}
}