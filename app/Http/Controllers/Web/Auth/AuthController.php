<?php

namespace App\Http\Controllers\Web\Auth;

use App\Helpers\DistanceHelper;
use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserBrand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $validations    = Validator::make($request->all(), [
            'email'     =>  'required|email',
            'password'  =>  'required',
        ],[
            'email.required'    => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $email      = $request->email;
        $password   = $request->password;
        $remember   = $request->get('remember');

        // getIP
        $getIp  = $request->ip();
        $location   = Location::get($getIp);

        $userEmail = User::where('email', $email)->first();


        if(!$userEmail || !Hash::check($password, optional($userEmail)->password)){

            if(!$userEmail){
                $request->session()->flash('error-email','Email tidak sesuai');
            }
            if (!Hash::check($password, optional($userEmail)->password)) {
                $request->session()->flash('error-password', 'Password salah!');
            }
        }

        if ($userEmail && $userEmail->status != 0) {
            if(Auth::attempt(['email' => $email, 'password' => $password], $remember))
            {
                    if($userEmail->secure == 1){
                        $verificationCode = rand(1000, 9999);
                        $userEmail->verification_code = $verificationCode;
                        $userEmail->save();

                        Mail::to($userEmail->email)->send(new VerificationMail($verificationCode));
                    }

                    $locationString = $location->cityName .','.$location->regionName;

                    $logs   = Activity::create([
                        'user_id'       => Auth::user()->id,
                        'date'          => Carbon::now()->format('Y-m-d'),
                        'ip'            => $getIp,
                        'location'      => $locationString ?? null,
                        'description'   => 'Login ke web admin sobatklik'
                    ]);
                    $request->session()->flash('success', 'Login berhasil!');
                    return redirect()->route('home');
            }
        }else {
            return redirect()->back()->with('error-login', 'Akun tidak aktif!');
        }

        return redirect()->back()->with('error-login', 'Username atau Password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;
        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Logout ke web admin sobatklik'
        ]);

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
