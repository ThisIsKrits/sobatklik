<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BrandList;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($name,$kode)
    {
        $user = User::with('brands')->where('fullname', $name)->whereHas('brands', function ($query) use ($kode) {
            $query->where('kode_brand','=', $kode);
        })->first();

        if (!$user || !$user->brands()) {
            abort(404);
        }


        $brand = $user->brands()->where('kode_brand', $kode)->first();
        // dd($brand);

        if (!$brand) {
            abort(404);
        }


        return view('admin.pengaturan.review',[
            'brand' => $brand,
            'user'  => $user
        ]);
    }

    public function store(Request $request)
    {
        Review::create([
            'admin_id'  => $request->admin_id,
            'review1' => $request->review1,
            'review2' => $request->review2,
            'review3' => $request->review3,
            'review4' => $request->review4,
            'response' => $request->response,
        ]);

        return redirect()->back()->with('setting-success', 'Review berhasil dikirim!');
    }

}
