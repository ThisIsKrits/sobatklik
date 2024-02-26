<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerfiController extends Controller
{
    public function verifSuccess($email)
    {
        return view('email.email-success',[
            'email' => $email
        ]);
    }

    public function verifFailed()
    {
        return view('email.email-failed');
    }

    public function verifWaiting($email)
    {
        return view('email.email-waiting',[
            'email' => $email
        ]);
    }
}
