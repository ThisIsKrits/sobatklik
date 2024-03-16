<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Http\Controllers\Controller;
use App\Models\ContactCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;
        $datas = ContactCategory::query()->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->get();

        return view('admin.master-data.category-contact.index',[
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
        return view('admin.master-data.category-contact.input');
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

        ContactCategory::create([
            'name'  => $request->name,
            'icon'  => $this->storeBase64($request->image_base64),
            'status'    => $request->status ?? 0,
        ]);

        return redirect()->route('data-contact.index')->with('setting-success', 'Data contact berhasil ditambahkan!');
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
        $data   = ContactCategory::findOrFail($id);

        return view('admin.master-data.category-contact.input',[
            'contact'  => $data
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

        $contact    = ContactCategory::findOrFail($id);

        if (!empty($request->image_base64)) {
            // Hapus gambar yang ada
            if (!is_null($contact->icon)) {
                $imagePath = public_path('storage/uploads/kontak/') . $contact->icon;
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

        return redirect()->route('data-contact.index')->with('setting-success', 'Data contact berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ContactCategory::findOrFail($id);

        $this->deleteImage($data->icon);

        $data->delete();

        return redirect()->back()->with('setting-success', 'Data Kategori Kontak Berhasil dihapus!');
    }

    private function storeBase64($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= time().'.png';
        $path = public_path('storage') . "/uploads/kontak/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function deleteImage($imageName)
    {
        $path = public_path("storage/uploads/kontak/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
