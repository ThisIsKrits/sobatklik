<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Http\Controllers\Controller;
use App\Models\AddressBrand;
use App\Models\BrandList;
use App\Models\ContactBrand;
use App\Models\ContactCategory;
use App\Models\SosmedBrand;
use App\Models\SosmedCategory;
use App\Trait\ImageProcessingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    use ImageProcessingTrait;
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
        $$contacts = ContactCategory::where('status', 1)->get();
        $sosmeds  = SosmedCategory::where('status', 1)->get();
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
            'status'        => $request->status ?? 0,
        ]);

        foreach ($request->address as $key => $value) {
            $brand->addresses()->create([
                'address'   => $value
            ]);
        }

        foreach ($request->label_contact as $key => $value) {
            $brand->contacts()->create([
                'contact_id'    => $request->contact_id[$key],
                'label'         => $value,
                'link'          => $request->link_contact[$key]
            ]);
        }

        foreach ($request->label_sosmed as $key => $value) {
            $brand->sosmeds()->create([
                'sosmed_id'     => $request->sosmed_id[$key],
                'label'         => $value,
                'link'          => $request->link_sosmed[$key]
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
        $addressBrand   = $brand->addresses()->get();
        $contactBrand   = $brand->contacts()->get();
        $sosmedBrand   = $brand->sosmeds()->get();
        $contacts = ContactCategory::where('status', 1)->get();
        $sosmeds  = SosmedCategory::where('status', 1)->get();

        // dd($addressBrand);

        return view('admin.master-data.brand-list.input',[
            'brand'  => $brand,
            'sosmeds'    => $sosmeds,
            'contacts'   => $contacts,
            'contactBrand'  => $contactBrand,
            'sosmedBrand'   => $sosmedBrand,
            'addressBrand'   => $addressBrand,
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
            'kode_brand'    =>  'required',
            'name'          => 'required',
            'tagline'       => 'required',
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $brand = BrandList::findOrFail($id);

        if (!empty($request->image_logo)) {
            // Hapus gambar yang ada
            if (!is_null($brand->logo)) {
                $imageLogo = public_path('storage/uploads/logo/') . $brand->logo;
                if (file_exists($imageLogo)) {
                    unlink($imageLogo);
                }
            }

            $logoName   = $this->storeLogo($request->image_logo);
        } else {
            $logoName = $brand->logo;
        }

        if (!empty($request->image_maskot)) {
            if (!is_null($brand->maskot)) {
                $imageMaskot = public_path('storage/uploads/maskot/') . $brand->maskot;
                if (file_exists($imageMaskot)) {
                    unlink($imageMaskot);
                }
            }

            $maskotName   = $this->storeMaskot($request->image_maskot);
        } else {
            $maskotName = $brand->maskot;
        }

        $brand->update([
            'name'          => $request->name,
            'kode_brand'    => $request->kode_brand,
            'tagline'       => $request->tagline,
            'logo'          => $logoName,
            'maskot'        => $maskotName,
            'status'        => $request->status ?? 0,
        ]);

        foreach ($request->address as $key => $value) {
            if (empty($request->id[$key])) {
                $brand->addresses()->create([
                    'address' => $value
                ]);
            } else {
                $adds = AddressBrand::find($request->id[$key]);
                $adds->update(
                    ['address' => $value]
                );
            }
        }

        // Perbarui kontak merek
        foreach ($request->label_contact as $key => $value) {
            if (empty($request->idContact[$key])) {
                $brand->contacts()->create([
                    'contact_id' => $request->contact_id[$key],
                    'label' => $value,
                    'link' => $request->link_contact[$key],
                ]);
            } else {
                $conts = ContactBrand::find($request->idContact[$key]);
                $conts->update([
                    'contact_id' => $request->contact_id[$key],
                    'label' => $value,
                    'link' => $request->link_contact[$key],
                ]);
            }
        }

        // Perbarui sosial media merek
        foreach ($request->label_sosmed as $key => $value) {
            if (empty($request->idSosmed[$key])) {
                $brand->sosmeds()->create([
                    'sosmed_id' => $request->sosmed_id[$key],
                    'label' => $value,
                    'link' => $request->link_sosmed[$key],
                ]);
            } else {
                $conts = SosmedBrand::find($request->idSosmed[$key]);
                $conts->update([
                    'sosmed_id' => $request->sosmed_id[$key],
                    'label' => $value,
                    'link' => $request->link_sosmed[$key],
                ]);
            }
        }

        // dd($request->all());

        return redirect()->route('data-brand.index')->with('setting-success', 'Data Brand berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BrandList::with('contacts','sosmeds','addresses')->findOrFail($id);

        $this->deleteLogo($data->logo);
        $this->deleteMaskot($data->maskot);

        if ($data->contacts()->exists()) {
            $data->contacts()->delete();
        }

        if ($data->sosmeds()->exists()) {
            $data->sosmeds()->delete();
        }

        if ($data->addresses()->exists()) {
            $data->addresses()->delete();
        }

        $data->delete();

        return redirect()->back()->with('setting-success', 'Data Brand Berhasil dihapus!');
    }
}
