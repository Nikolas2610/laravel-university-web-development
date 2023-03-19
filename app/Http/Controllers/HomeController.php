<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homePage()
    {
        $announcements = Announcements::orderBy('created_at', 'desc')->limit(3)->get();
        $fuelStats = $this->getFuelStats();

        return view('home', [
            'announcements' => $announcements,
            'fuelStats' => $fuelStats,
        ]);
    }

    public function getFuelStats() {
        $fuelStats = DB::table('offers')
            ->join('fuels', 'offers.fuel_id', '=', 'fuels.id')
            ->select('offers.fuel_id', 'fuels.name as fuel_name',
                DB::raw('MAX(amount) as max_amount'),
                DB::raw('MIN(amount) as min_amount'),
                DB::raw('AVG(amount) as avg_amount'))
            ->groupBy('offers.fuel_id', 'fuels.name')
            ->get();
        return $fuelStats;
    }
}
