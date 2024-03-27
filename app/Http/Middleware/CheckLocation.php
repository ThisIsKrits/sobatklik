<?php

namespace App\Http\Middleware;

use App\Helpers\DistanceHelper;
use App\Mail\VerificationMail;
use App\Models\UserBrand;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;

class CheckLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $getIp  = $request->ip();
        $location   = Location::get($getIp);

        // $userLat = $location->latitude;
        // $userLong = $location->longitude;

        if ($user && $user->secure == 1) {
            $userLat = $request->session()->get('userLat');
            $userLong = $request->session()->get('userLong');

            $brand = UserBrand::with('brand.addresses')->where('user_id', '=', $user->id)->get();
            $closestDistance = null;

            foreach ($brand as $userBrand) {
                foreach ($userBrand->brand->addresses as $address) {
                    $distance = DistanceHelper::haversineGreatCircleDistance($address->lat, $address->long, $userLat, $userLong);

                    if ($closestDistance === null || $distance < $closestDistance) {
                        $closestDistance = $distance;
                    }
                }
            }

            if ($closestDistance > 1) {
                    if ($user->verification_code) {
                        return redirect()->route('verif.view');
                    } else {
                        return $next($request);
                    }
            }



        }

       return $next($request);
    }
}
