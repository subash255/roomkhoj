<?php
namespace App\Models\User;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::User()->usertype=='admin')

    {
        return view('dashboard');
    }
    else{
        return view('users.index');
    }
    }
    
}
