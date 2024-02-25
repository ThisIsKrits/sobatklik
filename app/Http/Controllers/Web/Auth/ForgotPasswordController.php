<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgotPasswordView()
    {
        return view('auth.passwords.email');
    }

    public function submitForgetPasswordForm(Request $request)
      {
        $validation  = Validator::make($request->all(),[
            'email' => 'required|email|exists:users',
        ],[
            'email.required'    => 'Email tidak boleh kosong!',
            'email.exists'      => 'Email tidak valid',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $email  = $request->email;
        $token  = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(new ResetPasswordEmail($token,$email));

        return back()->with('message', 'Email reset password telah dikirim!');
      }

    public function resetPasswordView($email,$token)
    {
        return view('auth.passwords.reset',['email' => $email, 'token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
      {
        $validation = Validator::make($request->all(),[
            'email'     => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }


        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email,
                            'token' => $request->token
                            ])
                            ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/login')->with('success', 'Password berhasil diganti!');
      }
}
