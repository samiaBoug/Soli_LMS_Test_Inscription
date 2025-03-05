<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $statisticsService ;
    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService ;
    }
    public function index()
    {
        $users = $this->statisticsService->countInscrits();
        $qcm = $this->statisticsService->countQcm();
        $inscritWeb = $this->statisticsService->countWeb();
        $inscritMobile = $this->statisticsService->countMobile();
        $countResult = $this->statisticsService->countResult();
        $sumResult = $this->statisticsService->sumResult();
        $seuil= ($countResult > 0) ? $sumResult / $countResult : 0;
        $resultsDistribution = $this->statisticsService->getResultsDistribution();
        return response()->json([
            'message' => 'success',
            'users'=> $users ,
            'qcm'=>$qcm ,
            'inscritWeb'=> $inscritWeb,
            'inscritMobile'=> $inscritMobile,
            'countResult' => $countResult,
            'sumResult'=> $sumResult,
            'seuil'=> $seuil ,
            'resultsDistribution'=> $resultsDistribution 

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
