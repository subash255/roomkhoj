<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
        public function home()
        {
            $rooms=Rooms::all();
            return view ('welcome', compact('rooms'));
        }
        public function about()
        {
            return view ('about');
        }

       
    
}
