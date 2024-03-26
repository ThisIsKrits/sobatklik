<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\API\Report;
use App\Models\Speech;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $datas = Report::all();
        $date = Carbon::createFromFormat('Y-m-d', '2002-02-02');
        $user  = User::whereMonth('birthdate', $date->month)
        ->whereDay('birthdate', $date->day)
        ->first();

        $birthdate = Carbon::createFromFormat('Y-m-d', $user->birthdate);
        $age = $birthdate->age;
        // dd($age);

        $speeches = Speech::where('user_to', Auth::user()->id)->get();

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $location   = Location::get('27.124.95.100');

        $userLat = $location->latitude;
        $userLong = $location->longitude;

        return view('home',[
            'datas' => $datas,
            'user'  => $user,
            'age'   => $age,
            'speeches'  => $speeches,
            'userLat'   => $userLat,
            'userLong'  => $userLong
        ]);
    }
}
