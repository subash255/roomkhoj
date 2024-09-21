<?php

namespace App\Models\User;

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRooms = Rooms::count();
        $availableRooms = Rooms::where('status', 'available')->count(); // Assuming 'status' is a column
        $bookedRooms = $totalRooms - $availableRooms;
        $pendingRequests = Rooms::where('status', 'pending')->count(); // Example for pending requests
        $totalVisits = 30000;

        $monthlyUserGrowth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')->toArray();
            return view('dashboard',compact('totalUsers','totalRooms','availableRooms','bookedRooms','pendingRequests','totalVisits','monthlyUserGrowth'));
        
    }

}
