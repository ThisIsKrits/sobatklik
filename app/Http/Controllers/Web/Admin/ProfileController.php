<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use App\Trait\ImageProcessingTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class ProfileController extends Controller
{
    use ImageProcessingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('admin.panel.profile.index',[
            'data'  => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        if (!empty($request->image_base64)) {
            $profileImage = $data->profile;
            if (!is_null($profileImage)) {
                $imagePath = public_path('storage/uploads/profile/') . $profileImage->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $image = $this->storeProfile($request->image_base64);
        } else {
            $image = $data->profile()->image ?? '';
        }

        $data->update([
            'nickname'  => $request->nickname,
        ]);

        if ($data->profile) {
            $data->profile->update([
                'user_id'   => $data->id,
                'image' => $image,
            ]);
        }else{
            $data->profile->create([
                'user_id'   => $data->id,
                'image' => $image,
            ]);
        }

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Memperbarui profile'
        ]);

        return redirect()->back()->with('setting-success','Data profile berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
