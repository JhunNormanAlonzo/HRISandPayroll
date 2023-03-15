<?php

namespace App\Http\Controllers;

use App\Models\Wage;
use Illuminate\Http\Request;

class WageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wages = Wage::all();
        return view('wage.index', compact('wages'));
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
    public function show(Wage $wage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wage $wage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wage $wage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wage $wage)
    {
        //
    }
}
