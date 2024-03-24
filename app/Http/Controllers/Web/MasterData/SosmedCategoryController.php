<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\SosmedCategory;
use App\Trait\ImageProcessingTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class SosmedCategoryController extends Controller
{
    use ImageProcessingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas  = SosmedCategory::all();

        return view('admin.master-data.category-sosmed.index',[
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
        return view('admin.master-data.category-sosmed.input');
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
            'name'      => 'required',
            'image_base64' => 'required',
        ],[
            'name.required' => 'Nama sosial media tidak boleh kosong!',
            'image_base64.required' => 'Icon sosial media tidak boleh kosong!'
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        SosmedCategory::create([
            'name'  => $request->name,
            'icon'  => $this->storeSosmed($request->image_base64),
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
            'description'   => 'Membuat kategori sosmed'
        ]);

        return redirect()->route('data-sosmed.index')->with('setting-success', 'Data contact berhasil ditambahkan!');
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
        $sosmed   = SosmedCategory::findOrFail($id);

        return view('admin.master-data.category-sosmed.input',[
            'sosmed'  => $sosmed
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
            'name'      => 'required',
            'image_base64' => 'required',
        ],[
            'name.required' => 'Nama sosial media tidak boleh kosong!',
            'image_base64.required' => 'Icon sosial media tidak boleh kosong!'
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $contact    = SosmedCategory::findOrFail($id);

        if (!empty($request->image_base64)) {
            // Hapus gambar yang ada
            if (!is_null($contact->icon)) {
                $imagePath = public_path('storage/uploads/sosmed/') . $contact->icon;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Simpan gambar baru
            $iconName = $this->storeSosmed($request->image_base64);
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $iconName = $contact->icon;
        }

        $contact->update([
            'name'      => $request->name,
            'icon'      => $iconName,
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
            'description'   => 'Memperbarui kategori kontak'
        ]);

        return redirect()->route('data-sosmed.index')->with('setting-success', 'Data sosial media berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data = SosmedCategory::findOrFail($id);

        $this->deleteSosmed($data->icon);

        $data->delete();

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Mendelete kategori sosmed'
        ]);

        return redirect()->back()->with('setting-success', 'Data Kategori Sosial Media Berhasil dihapus!');
    }
}
