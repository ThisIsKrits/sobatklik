<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\API\Report;
use App\Models\BrandList;
use App\Models\Speech;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $datas = Report::all();

        // birthdate
        $date = Carbon::now();

        $user  = User::whereMonth('birthdate', $date->month)
        ->whereDay('birthdate', $date->day)
        ->first();

        if ($user) {
            $birthdate = Carbon::createFromFormat('Y-m-d', $user->birthdate);
            $age = $birthdate->age;
            // dd($age);
        } else {
            $age = null;
        }

        // end

        // speech list

        $speeches = Speech::where('user_to', Auth::user()->id)->get();

        // endspeech list

        // report by month
        $ReportMonth = Report::select(DB::raw('MONTH(created_at) as bulan'), DB::raw('COUNT(*) as jumlah_data'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        // endreport

        // report by brand
        $reportBrand = DB::table('brand_lists')
                        ->select('brand_lists.name as brand_name', 'brand_lists.logo as brand_logo', DB::raw('AVG(reports.avg) as avg_time'), DB::raw('COUNT(reports.id) as total_reports'))
                        ->leftJoin('reports', 'brand_lists.id', '=', 'reports.brand_id')
                        ->leftJoin('reviews', 'reports.id', '=', 'reviews.report_id')
                        ->join(DB::raw('(SELECT brand_id, AVG(avg) as avg FROM reports GROUP BY brand_id) as report'), 'brand_lists.id', '=', 'report.brand_id')
                        ->selectRaw('AVG(reviews.review1 + reviews.review2 + reviews.review3 + reviews.review4) / 4 as avg_rating')
                        ->groupBy('brand_lists.name', 'brand_lists.logo', 'report.avg')
                        ->get();

        // report by user
        $reportUser =DB::table('users')
                    ->select('users.fullname as user_name', DB::raw('AVG(reports.avg) as avg_time'), DB::raw('COUNT(reports.id) as total_reports'))
                    ->leftJoin('reports', 'users.id', '=', 'reports.admin_id')
                    ->leftJoin('reviews', 'reports.id', '=', 'reviews.report_id')
                    ->selectRaw('AVG(reviews.review1 + reviews.review2 + reviews.review3 + reviews.review4) / 4 as avg_rating')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where(function ($query) {
                        $query->where('roles.name', 'admin')
                            ->orWhere('roles.name', 'superadmin');
                    })
                    ->groupBy('users.fullname')
                    ->get();

        // dd($reportUser);

        // brand

        $brand = BrandList::select('id','name')->get();

        return view('home',[
            'datas' => $datas,
            'user'  => $user,
            'age'   => $age,
            'speeches'  => $speeches,
            'report'    => $ReportMonth,
            'brand'     => $brand,
            'reportBrand'   => $reportBrand,
            'reportUser'   => $reportUser,
        ]);
    }
}
