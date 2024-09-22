<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    
        public function home()
        {
            $rooms=Rooms::all()->take(6);
            return view ('welcome', compact('rooms'));
        }
        public function about()
        {
            return view ('about');
        }

        public function dashboard()
        {
            return view('dashboard');
        }
        
        public function search(Request $request)
    {
        // Get filter values from the request
        $location = $request->input('location');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        // Build the query
        $query = Rooms::query();

        // Apply filters
        if ($location) {
            $query->where('name', 'LIKE', "%{$location}%");
        }

        if ($min_price) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price) {
            $query->where('price', '<=', $max_price);
        }

        // Get the filtered properties
        $properties = $query->get();

        // Redirect to another page showing the results
        return view('search', compact('properties'));
    }
    public function showroom()
    {
         

        $rooms = Rooms::all()->groupBy('name')->sortKeys(); 
        // $shows=Rooms::where('name', $rooms->name)->get();
        $threeRooms = $rooms->flatMap(function ($roomGroup) {
            return $roomGroup->take(1); // Change this if you want to take more from each group
        })->take(3);
       
         return view('showroom', compact('rooms', 'threeRooms'));
    }
    public function moreroom(Request $request)
{
     
    $name= $request->input('name');  // Get the location from the request

    // Fetch rooms based on the location
    $rooms = Rooms::where('name', $name)->get(); 

    return view('moreroom', compact('rooms','name'));
}
    
}
