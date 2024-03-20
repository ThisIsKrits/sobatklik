<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::role('admin')->get();

        return view('admin.panel.users.index',[
            'datas'  => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $brands = BrandList::where('status',1)->get();

        return view('admin.panel.users.input',[
            'roles'     => $roles,
            'brands'    => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(),[
            'fullname'  => 'required',
            'birthdate' => 'required',
            'brand_id'  => 'required',
            'email'     => 'required|email|unique:users',
            'password'  =>  ['required',Password::min(8)],
        ],[
            'fullname.required' => 'Nama tidak boleh kosong!',
            'birthdate.required'    => 'Tanggal lahir tidak boleh kosong!',
            'brand_id.required'    => 'Brand tidak boleh kosong!',
            'email.required'    => 'Email tidak boleh kosong!',
            'email.email'    => 'Format email salah!',
            'email.unique'    => 'Email sudah digunakan!',
            'password.required'     => 'Password tidak boleh kosong!',
            'password.min'          => 'Password minimal 8 karakter!',
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $birthdate = Carbon::createFromFormat('d/m/Y', $request->birthdate)->format('Y-m-d');

        $user = User::create([
            'fullname'      => $request->fullname,
            'birthdate'     => $birthdate,
            'brand_id'      => $request->brand_id,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'status'        => $request->status ?? 0,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('data-user.index')->with('setting-success', 'Data user berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data   = User::findOrFail($id);

        return view('admin.panel.users.show',[
            'data'      => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $brands = BrandList::where('status',1)->get();

        $data   = User::findOrFail($id);
        return view('admin.panel.users.input',[
            'roles'     => $roles,
            'brands'    => $brands,
            'data'      => $data
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
        //
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
