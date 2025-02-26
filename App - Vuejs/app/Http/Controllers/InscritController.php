<?php

namespace App\Http\Controllers;

use App\Services\InscritService;
use Illuminate\Http\Request;

class InscritController extends Controller
{
   protected $inscritService ;
   public function __construct(InscritService $inscritService)
   {
    $this->inscritService= $inscritService ;
   }
    public function index()
    {
        $inscrits = $this->inscritService->getAll();
        return view('admin.inscrit.index', compact('inscrits'));
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
