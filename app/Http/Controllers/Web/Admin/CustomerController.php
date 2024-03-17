<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

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

        return redirect()->route('data-customer.index')->with('message-success', 'Data customer berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->destroy();

        return redirect()->route('data-customer.index')->with('message-success', 'Data customer berhasil dihapus!');
    }
}
