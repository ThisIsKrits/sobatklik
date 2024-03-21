<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\API\Response;
use App\Models\BrandList;
use App\Models\Report;
use App\Models\ReportType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Report::all();
        return view('admin.panel.report.index',[
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
        $brands = BrandList::where('status',1)->get();
        $customers  = User::where('status',1)->role('customer')->get();
        $types      = ReportType::all();
        return view('admin.panel.report.input',[
            'brands'    => $brands,
            'customers' => $customers,
            'types'     => $types
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
        // dd($request->all());
        $validations = Validator::make($request->all(),[
            'type_id'       => 'required',
            'brand_id'       => 'required',
            'customer_id'       => 'required',
            'complaint'     => 'required',
        ],[
            'type_id.required'  => 'Jenis Keluhan tidak boleh kosong!',
            'brand_id.required'  => 'Brand tidak boleh kosong!',
            'customer_id.required'  => 'Brand tidak boleh kosong!',
            'complaint.required' => 'Keluhan tidak boleh kosong!'
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $currentDate = Carbon::now()->startOfMonth()->format('Y-m-01');
        $reportCount = Report::where('brand_id', $request->brand_id)
                    ->whereBetween('report_date', [$currentDate, Carbon::now()->endOfMonth()->format('Y-m-t')])
                    ->count();

        $brand = BrandList::find($request->brand_id);

        $code = $brand->kode_brand. '/'. Carbon::now()->format('dmY') . '/' . str_pad($reportCount + 1, 5, '0', STR_PAD_LEFT);

        $categpry   = 'email';

        $report = Report::create([
            'codes'     => $code,
            'category'  => 'email',
            'type_id'   => $request->type_id,
            'report_date'   => Carbon::now()->toDateTimeString(),
            'brand_id'      => $brand->id,
            'admin_id'      => Auth::user()->id,
            'reporter_id'   => $request->customer_id,
            'complaint'     => $request->complaint,
            'status'        => 1
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('uploads/report', 'public');

                $report->files()->create([
                    'name' => $fileName,
                ]);
            }
        }

        // $getIp  = $request->ip();
        // $location   = Location::get($getIp);
        // $locationString = $location->cityName .','.$location->regionName;

        // $logs   = Activity::create([
        //     'user_id'       => Auth::user()->id,
        //     'date'          => Carbon::now()->format('Y-m-d'),
        //     'ip'            => $getIp,
        //     'location'      => $locationString ?? null,
        //     'description'   => 'Membuat laporan untuk user'
        // ]);

        return redirect()->route('data-report.index')->with('setting-success','Data laporan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        $responses  = Response::where('report_id',$id)->get();
        return view('admin.panel.report.show',[
            'report'    => $report,
            'responses' => $responses
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
        $data = Report::with('files')->findOrFail($id);

        if(isset($data->files)){
            foreach ($data->files as $file) {
                $path = public_path() . "/storage/uploads/report/" . $file->name;

                if (file_exists($path)) {
                    unlink($path);
                }

                $file->delete();
            }
        }


        $data->delete();

         // $getIp  = $request->ip();
        // $location   = Location::get($getIp);
        // $locationString = $location->cityName .','.$location->regionName;

        // $logs   = Activity::create([
        //     'user_id'       => Auth::user()->id,
        //     'date'          => Carbon::now()->format('Y-m-d'),
        //     'ip'            => $getIp,
        //     'location'      => $locationString ?? null,
        //     'description'   => 'Membuat laporan untuk user'
        // ]);


        return redirect()->back()->with('setting-success','Data laporan berhasil dihapus');
    }
}
