<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = DB::table('offers')
            ->join('companies', 'offers.company_id', '=', 'companies.id')
            ->join('locations', 'companies.location_id', '=', 'locations.id')
            ->select('offers.*', 'companies.label as company_label', 'locations.city as company_location')
            ->where('offers.status', '=', 'published')
            ->simplePaginate(10);

        $contractTypes = DB::table('offers')
            ->distinct('contract_type')
            ->pluck('contract_type');

        $jobTypes = DB::table('offers')
            ->distinct('job_type')
            ->pluck('job_type');

        return view('dashboard.index', compact('offers', 'contractTypes', 'jobTypes'));
    }
}
