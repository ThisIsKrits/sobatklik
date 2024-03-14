<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Http\Controllers\Controller;
use App\Models\AddressBrand;
use App\Models\BrandList;
use App\Models\ContactBrand;
use App\Models\ContactCategory;
use App\Models\SosmedBrand;
use App\Models\SosmedCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas  = BrandList::all();

        return view('admin.master-data.brand-list.index',[
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
        $contacts = ContactCategory::all();
        $sosmeds  = SosmedCategory::all();
        return view('admin.master-data.brand-list.input',[
            'sosmeds'    => $sosmeds,
            'contacts'   => $contacts
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
            'image_logo'          => 'required',
            'image_maskot'        => 'required',
            'kode_brand'    =>  'required',
            'name'          => 'required',
            'tagline'       => 'required',
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $brand = BrandList::create([
            'name'          => $request->name,
            'kode_brand'    => $request->kode_brand,
            'tagline'       => $request->tagline,
            'logo'          => $this->storeLogo($request->image_logo),
            'maskot'        => $this->storeMaskot($request->image_maskot),
        ]);

        foreach ($request->address as $keyA => $address) {
            AddressBrand::create([
                'brand_id'  => $brand->id,
                'address'   => $request->address[$keyA]
            ]);
        }

        foreach ($request->contact_id as $keyB => $contact) {
            ContactBrand::create([
                'brand_id'      => $brand->id,
                'contact_id'    => $request->contact_id[$keyB],
                'label'         => $request->label_contact[$keyB],
                'link'          => $request->link_contact[$keyB]
            ]);
        }

        foreach ($request->sosmed_id as $keyC => $contact) {
            SosmedBrand::create([
                'brand_id'      => $brand->id,
                'sosmed_id'     => $request->sosmed_id[$keyC],
                'label'         => $request->label_sosmed[$keyC],
                'link'          => $request->link_sosmed[$keyC]
            ]);
        }

        // dd($request->all());

        return redirect()->route('data-brand.index')->with('setting-success', 'Data Brand berhasil ditambahkan!');
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
        $brand   = BrandList::findOrFail($id);
        $contactBrand   = ContactBrand::all();
        $sosmedBrand   = SosmedBrand::all();
        $contacts = ContactCategory::all();
        $sosmeds  = SosmedCategory::all();

        return view('admin.master-data.brand-list.input',[
            'brand'  => $brand,
            'sosmeds'    => $sosmeds,
            'contacts'   => $contacts,
            'contactbrand'  => $contactBrand,
            'sosmedBrand'   => $sosmedBrand,
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
        $data = BrandList::with('contact','sosmed','address')->findOrFail($id);

        $this->deleteLogo($data->logo);
        $this->deleteMaskot($data->maskot);

        $data->delete();

        return redirect()->back()->with('setting-success', 'Data Brand Berhasil dihapus!');
    }

    private function storeLogo($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= 'logo'.time().'.png';
        $path = public_path('storage') . "/uploads/logo/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function storeMaskot($imageBase64)
    {
        list($type, $imageBase64) = explode(';', $imageBase64);
        list(, $imageBase64)      = explode(',', $imageBase64);
        $imageBase64 = base64_decode($imageBase64);
        $imageName= 'maskot'.time().'.png';
        $path = public_path('storage') . "/uploads/maskot/" . $imageName;

        file_put_contents($path, $imageBase64);

        return $imageName;
    }

    private function deleteLogo($imageName)
    {
        $path = public_path("storage/uploads/contact/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function deleteMaskot($imageName)
    {
        $path = public_path("storage/uploads/sosmed/$imageName");

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
