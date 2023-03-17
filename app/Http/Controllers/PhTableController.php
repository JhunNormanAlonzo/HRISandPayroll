<?php

namespace App\Http\Controllers;

use App\Models\PhTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ph_tables = PhTable::all();
        return view('phtable.index', compact('ph_tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('phtable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'phbracket' => 'required',
            'phfrom' => 'required',
            'phto' => 'required',
            'sal_base' => 'required',
            'personal' => 'required',
            'employer' => 'required',
        ]);

        $input = $request->all();
        $input['phiccode'] = "_".strtoupper(Str::random(9));
        $input['total'] = $request->personal + $request->employer;
        PhTable::create($input);

        return redirect()->back()->with('message', 'PhTable Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhTable $phtable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhTable $phtable)
    {

        return view('phtable.edit', compact('phtable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhTable $phtable)
    {
        $this->validate($request, [
            'phbracket' => 'required',
            'phfrom' => 'required',
            'phto' => 'required',
            'sal_base' => 'required',
            'personal' => 'required',
            'employer' => 'required',
        ]);

        $input = $request->all();
        $input['total'] = $request->personal + $request->employer;

        $phtable->update($input);
        return redirect()->route('phtables.index')->with('message', 'PhTable Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhTable $phtable)
    {
        $phtable->delete();
        return redirect()->back()->with('message', 'PhTable Deleted Successfully!');
    }
}
