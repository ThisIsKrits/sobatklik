<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecureController extends Controller
{
    public function update(Request $request)
    {
        $userId   = Auth::user()->id;

        $user = User::find($userId);

        $user->secure = $request->secure;
        $user->save();

        return response()->json([
            'success'   => true,
            'message'   => 'Secure login Berhasil diubah'
        ]);
    }
}
