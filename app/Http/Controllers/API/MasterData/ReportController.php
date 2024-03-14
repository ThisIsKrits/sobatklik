<?php

namespace App\Http\Controllers\API\MasterData;

use App\Http\Controllers\Controller;
use App\Models\API\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas   = Report::all();

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
            'category'      => 'required',
            'type_id'       => 'required',
            'complaint'     => 'required',
        ],[
            'category.required' => 'Kategori tidak boleh kosong!',
            'type_id.required'  => 'Jenis Keluhan tidak boleh kosong!',
            'complaint.required' => 'Keluhan tidak boleh kosong!'
        ]);

        if ($validations->fails()) {
            return $this->validationError($validations);
        }

        $reportCount = Report::count();
        $code = 'TIX-' . str_pad($reportCount + 1, 5, '0', STR_PAD_LEFT) . '-' . date('Y');

        $report = Report::create([
            'codes'     => $code,
            'category'  => $request->category,
            'type_id'   => $request->type_id,
            'report_date'   => Carbon::now()->toDateTimeString(),
            'brand_id'      => $request->brand_id,
            'reporter_id'   => Auth::user()->id,
            'complaint'     => $request->complaint,
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
