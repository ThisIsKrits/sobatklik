<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\API\ColorSelect;
use App\Models\API\Theme;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class AuthController extends Controller
{
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
            return response()->json([
                'errors'    => $validations->getMessageBag()->toArray()
            ], 403);
        }

        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d');

        $user   = User::create([
            'fullname'      => $request->fullname,
            'email'         => $request->email,
            'birthdate'     => $birthdate,
            'phone'         => $request->phone,
            'password'      => bcrypt($request->password),
        ]);

        $user->assignRole('customer');

        $token = JWTAuth::fromUser($user);

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
            'email'     =>  'required|email',
            'password'  =>  'required',
        ],[
            'email.required'    => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        if($validations->fails())
        {
            return response()->json([
                'errors'    => $validations->getMessageBag()->toArray()
            ]);
        }

        $email      = $request->email;
        $password   = $request->password;

        $user   = User::where('email',$email)->first();

        if(!$user)
        {
            return response()->json([
                'success'   => false,
                'message'   => 'Email tidak terdaftar. Silahkan lengkapi biodata!'
            ]);
        }

        if(!Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return response()->json([
                'success'   => false,
                'message'   => 'Username atau Password salah!',
            ]);
        }

        $token  = JWTAuth::attempt(['email' => $email, 'password' => $password]);

        $theme  = ColorSelect::find(1)->getTheme;

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
            return response()->json([
                'success'   => false,
                'message'   => $validations->getMessageBag()->toArray()
            ]);
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
        Auth::user()->tokens()->delete();
        return response()->json([
            'success'   => true,
            'message'   => 'Logout berhasil',
        ], 200);
    }
}
