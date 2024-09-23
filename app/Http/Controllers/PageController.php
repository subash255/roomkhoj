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
            // Validate the request inputs
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'min_price' => 'nullable|integer|min:0',
                'max_price' => 'nullable|integer|min:0',
            ], [
                'name.required' => 'Location is required',
                'name.max' => 'Location must not exceed 255 characters',
                'min_price.integer' => 'Minimum price must be a valid number',
                'min_price.min' => 'Minimum price must be at least 0',
                'max_price.integer' => 'Maximum price must be a valid number',
                'max_price.min' => 'Maximum price must be at least 0',
            ]);
        
            // Extract values from the validated data
            $name = $validated['name'];
            $min_price = $validated['min_price'] ?? null;
            $max_price = $validated['max_price'] ?? null;
        
            // Build the query
            $query = Rooms::query();
        
            // Apply filters
            if ($name) {
                $query->where('name', 'LIKE', "%{$name}%");
            }
        
            if ($min_price !== null) {
                $query->where('price', '>=', $min_price);
            }
        
            if ($max_price !== null) {
                $query->where('price', '<=', $max_price);
            }
        
            // Get the filtered properties
            $properties = $query->get();
        
            // Return the view with the filtered properties
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
