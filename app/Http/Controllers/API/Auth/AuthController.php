<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\API\ColorSelect;
use App\Models\API\Theme;
use App\Models\User;
use App\Trait\ValidationTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Stevebauman\Location\Facades\Location;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class AuthController extends Controller
{
    use ValidationTrait;

    public function checkEmail(Request $request){
        $validations = Validator::make($request->all(),[
            'email'     => 'required'
        ],[
            'email.required'    => 'Email tidak boleh kosong!'
        ]);

        if($validations->fails())
        {
            return $this->validationError($validations);
        }

        $email  = $request->email;
        $user   = User::where('email',$email)->first();

         if(!$user)
        {
            return response()->json([
                'success'   => false,
                'message'   => 'Email tidak terdaftar!',
                'email'     => $email,
            ]);
        } else {
            return response()->json([
                'success'   => true,
                'message'   => 'Email sudah terdaftar',
                'email'     => $email,
            ]);
        }
    }

    public function register(Request $request)
    {
        $validations   =    Validator::make($request->all(),[
            'email'     => 'required|email|unique:users',
            'password'  => ['required',Password::min(8)],
            'fullname'  => 'required',
            'phone'     => 'required|numeric|min_digits:11|max_digits:15',
            'birthdate' => 'required|',
        ],[
            'fullname.required'     => 'Nama tidak boleh kosong!',
            'email.required'        => 'Email tidak boleh kosong!',
            'password.required'     => 'Password tidak boleh kosong!',
            'password.min'          => 'Password minimal 8 karakter!',
            'phone.min_digits'      => 'No Hp minimal 11 digit!',
            'phone.max_digits'      => 'No Hp maksimal 15 digit!',
            'birthdate.required'    => 'Tanggal lahir tidak boleh kosong!'
        ]);


        if($validations->fails())
        {
            return $this->validationError($validations);
        }

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d');

        $user   = User::create([
            'fullname'      => $request->fullname,
            'email'         => $request->email,
            'birthdate'     => $birthdate,
            'phone'         => $request->phone,
            'password'      => bcrypt($request->password),
            'status'        => 1,
        ]);


        $user->assignRole('customer');

        JWTAuth::factory()->setTTL(50000);

        $token = JWTAuth::fromUser($user);

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        $logs   = Activity::create([
            'user_id'       => $user->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Login ke aplikasi sobatklik'
        ]);

        $theme  = ColorSelect::find(1)->getTheme;

        return response()->json([
            'success'   => true,
            'message'   => 'Registrasi berhasil!',
            'data'      => $user,
            'tema'      => $theme->colors,
            'token'     => $token,
            'type'      => 'Bearer Token',
        ]);
    }

    public function login(Request $request)
    {
        $validations    = Validator::make($request->all(), [
            'password'  =>  'required',
        ],[
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        if($validations->fails())
        {
            return $this->validationError($validations);
        }

        $email      = $request->email;
        $password   = $request->password;

        $user   = User::where('email',$email)->first();

        if(!Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return response()->json([
                'success'   => false,
                'message'   => 'Username atau Password salah!',
            ]);
        }

        JWTAuth::factory()->setTTL(50000);
        $token  = JWTAuth::attempt(['email' => $email, 'password' => $password]);

        $theme  = ColorSelect::find(1)->getTheme;
        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        // Use the Ip2LocationHelper to get the user's location
        // $location = Ip2LocationHelper::getLocationByIp($ipAddress);

        $logs   = Activity::create([
            'user_id'       => $user->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Login ke aplikasi sobatklik'
        ]);


        return response()->json([
            'success'   => true,
            'message'   => 'Login berhasil',
            'theme'     => $theme->colors,
            'token'     => $token,
            'type'      => 'Bearer Token'
        ]);
    }

    public function change_password(Request $request)
    {
        $validations    = Validator::make($request->all(), [
            'old_password'      => 'required',
            'password'          => 'required',
        ],[
            'old_password.required' => 'Password lama tidak boleh kosong!',
            'password.required'     => 'Password baru tidak boleh kosong!',
        ]);

        if($validations->fails())
        {
            return $this->validationError($validations);
        }

        if(!Hash::check($request->old_password, auth()->user()->password))
        {
            return response()->json([
                'success'   => false,
                'message'   => 'Password lama tidak sesuai!'
            ]);
        }

        $password   = Auth::user();

        $password->update([
            'password'  => bcrypt($request->password)
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Password berhasil diganti!'
        ]);
    }

    public function logout(Request $request)
    {
        JWTAuth::parseToken()->invalidate();

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;
        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Logout dari aplikasi sobatklik'
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Logout berhasil',
        ], 200);
    }
}
