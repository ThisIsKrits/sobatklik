<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Stevebauman\Location\Facades\Location;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::role('customer')->get();
        return view('admin.panel.customer.index',[
            'datas' => $datas
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
        $data = User::findOrFail($id);
        return view('admin.panel.customer.edit',[
            'data'  => $data
        ]);
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
        $validations = Validator::make($request->all(),[
            'fullname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'birthdate' => 'required',
            'password'  => ['nullable',Password::min(8)],
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $data   = User::findOrFail($id);

        $data->update([
            'fullname'  => $request->fullname,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'birthdate' => $request->birthdate,
            'password'  => bcrypt($request->password),
            'status'    => $request->status ?? 0,
        ]);

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Memperbarui data customer'
        ]);

        return redirect()->route('data-customer.index')->with('message-success', 'Data customer berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data = User::findOrFail($id);

        $data->delete();

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Mendelete data customer'
        ]);

        return redirect()->back()->with('message-success', 'Data customer berhasil dihapus!');
    }
}
