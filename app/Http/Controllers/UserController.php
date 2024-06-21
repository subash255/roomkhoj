<?php
namespace App\Models;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    return view('users.index');
    }
    public function profile()
    {
       return view('users.profile');
    }
    public function room()
    {

    }
}
