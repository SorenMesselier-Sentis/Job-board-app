<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

        return view('dashboard.index', compact('offers'));
    }
}
