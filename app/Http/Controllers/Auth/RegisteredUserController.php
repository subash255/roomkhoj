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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
            'photopath' => 'required|image',
            'dob' => 'required',
            'phonenumber' => 'required',
            
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),     
            'photopath' => $request->photopath,
            'dob' => $request->dob,
            'phonenumber' => $request->phonenumber,


        ]);
        $photoname = time().'.'.$request->photopath->extension();
    $request->photopath->move(public_path('image/rooms'),$photoname);
            $user['photopath'] = $photoname;

        event(new Registered($user));


        Auth::login($user);

        return redirect(route('login', absolute: false));
    }
}
