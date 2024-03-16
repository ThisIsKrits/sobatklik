<?php

namespace App\Http\Controllers\API\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = Auth::user();

        return response()->json([
            'success'   => true,
            'message'   => 'Data berhasil ditampilkan',
            'data'      => $data
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
        $validations    = Validator::make($request->all(),[
            'fullname'  => 'required',
            'phone'     => 'required',
            'birthdate' => 'required',
        ]);

        if($validations->fails())
        {
            return response()->json([
                'success'   => false,
                'message'   => $validations->getMessageBag()->toArray()
            ]);
        }

        $data   = User::findOrFail($id);
        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d');

        $data->update([
            'fullname'  => $request->fullname,
            'phone'     => $request->phone,
            'birthdate' => $birthdate,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Data akun berhasil diubah!',
            'data'      => $data
        ]);
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

    public function updateProfile(Request $request)
    {
        $validations    = Validator::make($request->all(),[
            'fullname'  => 'required',
            'phone'     => 'required',
            'birthdate' => 'required',
        ]);

        if($validations->fails())
        {
            return $this->validationError($validations);
        }

        $data   = Auth::user();
        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d');

        $data->update([
            'fullname'  => $request->fullname,
            'phone'     => $request->phone,
            'birthdate' => $birthdate,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Data akun berhasil diubah!',
            'data'      => $data
        ]);
    }
}
