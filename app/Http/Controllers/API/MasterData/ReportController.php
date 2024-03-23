<?php

namespace App\Http\Controllers\API\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\BrandList;
use App\Models\Report;
use App\Trait\AdminBrandTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class ReportController extends Controller
{
    use AdminBrandTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        // dd($userId);
        $datas   = Report::where('reporter_id', $userId)->get();

        return response()->json([
            'success'   => true,
            'message'   => 'Data laporan berhasil ditampilkan!',
            'data'      => $datas,
        ],200);
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
        $validations = Validator::make($request->all(),[
            'contact_id'      => 'required',
            'type_id'       => 'required',
            'complaint'     => 'required',
        ],[
            'contact_id.required' => 'Kategori tidak boleh kosong!',
            'type_id.required'  => 'Jenis Keluhan tidak boleh kosong!',
            'complaint.required' => 'Keluhan tidak boleh kosong!'
        ]);

        if ($validations->fails()) {
            return $this->validationError($validations);
        }

        $currentDate = Carbon::now()->startOfMonth()->format('Y-m-01');
        $reportCount = Report::where('brand_id', $request->brand_id)
                    ->whereBetween('report_date', [$currentDate, Carbon::now()->endOfMonth()->format('Y-m-t')])
                    ->count();

        $brand = BrandList::find($request->brand_id);

        $code = $brand->kode_brand. '/'. Carbon::now()->format('dmY') . '/' . str_pad($reportCount + 1, 5, '0', STR_PAD_LEFT);

        $adminId = $this->assignAdmin($request->brand_id);

        $report = Report::create([
            'codes'         => $code,
            'contact_id'    => $request->contact_id,
            'type_id'       => $request->type_id,
            'report_date'   => Carbon::now()->toDateTimeString(),
            'brand_id'      => $brand->id,
            'admin_id'      => $adminId,
            'reporter_id'   => Auth::user()->id,
            'complaint'     => $request->complaint,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/report', $fileName, 'public');

                $report->files()->create([
                    'name' => $fileName,
                ]);
            }
        }

        $getIp  = $request->ip();
        $location   = Location::get($getIp);
        $locationString = $location->cityName .','.$location->regionName;

        $logs   = Activity::create([
            'user_id'       => Auth::user()->id,
            'date'          => Carbon::now()->format('Y-m-d'),
            'ip'            => $getIp,
            'location'      => $locationString ?? null,
            'description'   => 'Membuat laporan'
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Laporan berhasil dikirim!',
            'data'      => $report
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::with(['type','files'])->findOrFail($id);

        return response()->json([
            'success'   => true,
            'message'   => 'Laporan berhasil ditampilkan!',
            'data'      => $report
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
