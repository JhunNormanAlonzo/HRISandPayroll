<?php

namespace App\Http\Controllers;

use App\Models\Spdate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spdates = Spdate::all();
        return view('spdate.index', compact('spdates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spdate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sp_date' => 'required',
            'holiday' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();
        $input['sp_ctrl'] = "_".strtoupper(Str::random(9));

        Spdate::create($input);
        return redirect()->route('spdates.index')->with('message', 'Special Date Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spdate $spdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spdate $spdate)
    {
        return view('spdate.edit', compact('spdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spdate $spdate)
    {
        $this->validate($request, [
            'sp_date' => 'required',
            'holiday' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();

        $spdate->update($input);
        return redirect()->route('spdates.index')->with('message', 'Special Date Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spdate $spdate)
    {
        $spdate->delete();

        return redirect()->back()->with('message', 'Special Date Deleted Successfully!');
    }
}
