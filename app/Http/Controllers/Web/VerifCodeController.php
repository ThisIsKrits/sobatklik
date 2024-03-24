<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifCodeController extends Controller
{
    public function verifCodeView()
    {
        $id = Auth::user()->id;
        return view('admin.verification.selfie',[
            'id'    => $id
        ]);
    }

    public function codeVerif()
    {
        return view('admin.verification.verification-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => ['required', 'digits:4'],
        ]);

        $user = Auth::user();

        if (!$user || $user->verification_code != $request->code) {
            return redirect()->back()->with('error', 'Kode tidak sesuai!');
        }

        $user->verification_code = null;
        $user->save();

        $request->session()->flash('success', 'Login berhasil!');
        return redirect()->route('home');
    }
}
