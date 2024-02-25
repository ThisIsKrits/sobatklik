<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerfiController extends Controller
{
    public function verifSuccess()
    {
        return view('email.email-success');
    }

    public function verifFailed()
    {
        return view('email.email-failed');
    }

    public function verifWaiting()
    {
        return view('email.email-waiting');
    }
}
