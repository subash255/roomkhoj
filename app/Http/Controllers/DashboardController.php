<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // User and Room statistics
        $totalUsers = User::count();
        $totalRooms = Rooms::count();
        $availableRooms = Rooms::where('status', 'available')->count(); // Assuming 'status' is a column
        $pendingRequests = Rooms::where('status', 'pending')->count(); 
        $totalVisits = 30000; // Example for total visits, adjust as necessary

        // Monthly user growth
        $monthlyUserGrowth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')->toArray();

        // Ensure the monthly data has all months represented (1 to 12)
        $monthlyUserGrowth = array_replace(array_fill(1, 12, 0), $monthlyUserGrowth);

        // Total visited users per day
        $visitedUsersPerDay = Rooms::selectRaw('DATE(created_at) as date, COUNT(*) as total_visits')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->pluck('total_visits', 'date')->toArray();

        // Pass all variables to the view
        return view('dashboard', compact(
            'totalUsers',
            'totalRooms',
            'availableRooms',
            'pendingRequests',
            'totalVisits',
            'monthlyUserGrowth',
            'visitedUsersPerDay'
        ));
    }

    public function notification()
    {
       $notifications = books::with('room', 'user')->where('status', 'booked')->get();

        return view('notification' , compact('notifications'));
       
    }
    public function view($id)
    {
        $notifications= books::with('room', 'user')->findOrFail($id);

        return view('view',compact('notifications') );
    }
}
