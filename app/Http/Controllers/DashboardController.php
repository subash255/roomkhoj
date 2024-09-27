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
      // User and Room statistics
$totalUsers = User::count();
$totalRooms = Rooms::count();
$availableRooms = Rooms::where('status', 'available')->count(); // Assuming 'status' is a column
$bookedRooms = $totalRooms - $availableRooms;
$pendingRequests = Rooms::where('status', 'pending')->count(); // Example for pending requests
$totalVisits = 30000;

// Monthly user growth
$monthlyUserGrowth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
    ->groupBy('month')
    ->orderBy('month')
    ->pluck('count', 'month')->toArray();

// Total visited users per day
$visitedUsersPerDay = Rooms::selectRaw('DATE(created_at) as date, COUNT(*) as total_visits')
    ->groupBy('date')
    ->orderBy('date', 'desc')
    ->pluck('total_visits', 'date')->toArray();

// Pass all variables to the view
return view('dashboard', compact(
    'totalUsers','totalRooms','availableRooms','bookedRooms','pendingRequests','totalVisits','monthlyUserGrowth','visitedUsersPerDay'
));
    }

}
