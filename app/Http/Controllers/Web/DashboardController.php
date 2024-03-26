<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\API\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = Report::all();
        $date = Carbon::createFromFormat('Y-m-d', '2002-02-02');
        $user  = User::whereMonth('birthdate', $date->month)
        ->whereDay('birthdate', $date->day)
        ->first();
        $birthdate = Carbon::createFromFormat('Y-m-d', $user->birthdate);
        $age = $birthdate->age;
        // dd($age);

        return view('home',[
            'datas' => $datas,
            'user'  => $user,
            'age'   => $age
        ]);
    }
}
