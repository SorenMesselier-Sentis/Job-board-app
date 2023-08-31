<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orderDate = 'asc';
        $orderLabel = 'asc';

        $dateAsc = false;
        $alphabeticalAsc = false;

        if ($request->dateAsc) {
            $orderDate = 'desc';
            $dateAsc = true;
        }

        if ($request->alphabeticalAsc) {
            $orderLabel = 'desc';
            $alphabeticalAsc = true;
        }

        $contractTypes = DB::table('offers')
            ->distinct('contract_type')
            ->pluck('contract_type');

        $jobTypes = DB::table('offers')
            ->distinct('job_type')
            ->pluck('job_type');

        $offers = DB::table('offers')
            ->join('companies', 'offers.company_id', '=', 'companies.id')
            ->join('locations', 'companies.location_id', '=', 'locations.id')
            ->select('offers.*', 'companies.label as company_label', 'locations.city as company_location')
            ->where('offers.status', '=', 'published')
            ->orderBy('published_at', $orderDate)
            ->orderBy('label', $orderLabel)
            ->simplePaginate(10);

        return view('dashboard.index', [
            'dataOffer' => compact('offers', 'contractTypes', 'jobTypes'),
            'dateAsc' => $dateAsc,
            'alphabeticalAsc' =>$alphabeticalAsc,
        ]);
    }
}
