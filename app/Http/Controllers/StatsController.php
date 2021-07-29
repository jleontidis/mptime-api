<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Pointage;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function getDashboardStats() {

        $tenants = Tenant::count();
        $badges = Badge::count();
        $employees = User::count();
        $pointages = Pointage::where('user_id', auth()->user()->id)->count();

        return response()->json(['tenants' => $tenants, 'projects'=> 15 ,'badges' => $badges, 'employees' => $employees, 'pointages' => $pointages]);
    }
}
