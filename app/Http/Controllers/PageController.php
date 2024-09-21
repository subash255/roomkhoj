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
    
}
