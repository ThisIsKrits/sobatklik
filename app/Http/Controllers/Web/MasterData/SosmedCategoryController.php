<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Http\Controllers\Controller;
use App\Models\SosmedCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SosmedCategoryController extends Controller
{
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
        $validation = Validator::make($request->all(),[
            'name'      => 'required',
            'image_base64' => 'required',
        ]);

        SosmedCategory::create([
            'name'  => $request->name,
            'icon'  => $this->storeBase64($request->image_base64),
            'status'    => $request->status ?? 0,
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
        $validation = Validator::make($request->all(),[
            'name'  => 'required',
        ]);

        $contact    = SosmedCategory::findOrFail($id);

        if ($request->has('image_base64')) {
            // Hapus gambar yang ada
            if (!is_null($contact->icon)) {
                $imagePath = public_path('storage/uploads/sosmed/') . $contact->icon;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Simpan gambar baru
            $iconName = $this->storeBase64($request->image_base64);
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $iconName = $contact->icon;
        }

        $contact->update([
            'name'      => $request->name,
            'icon'      => $iconName,
            'status'    => $request->status ?? 0,
        ]);

        return redirect()->route('data-sosmed.index')->with('setting-success', 'Data sosial media berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SosmedCategory::findOrFail($id);

        $this->deleteImage($data->icon);

        $data->delete();

        return redirect()->back()->with('setting-success', 'Data Kategori Sosial Media Berhasil dihapus!');
    }

    private function storeBase64($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= time().'.png';
        $path = public_path('storage') . "/uploads/sosmed/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function deleteImage($imageName)
    {
        $path = public_path("storage/uploads/sosmed/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
