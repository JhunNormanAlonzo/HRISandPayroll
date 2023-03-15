<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('division.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'sectioncode' => 'required',
           'sectionname' => 'required'
        ]);

        Section::create($request->all());
        return redirect()->route('divisions.index')->with('message', 'Division Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $division)
    {
        return view('divisions.edit', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $division)
    {
        return view('division.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $division)
    {
        $this->validate($request, [
            'sectioncode' => 'required',
            'sectionname' => 'required'
        ]);

        $division->update($request->all());
        return redirect()->route('divisions.index')->with('message', 'Division Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $division)
    {

        $division->delete();
        return redirect()->route('divisions.index')->with('message', 'Division Deleted Successfully!');
    }
}
