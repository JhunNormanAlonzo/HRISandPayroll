<?php

namespace App\Http\Controllers;

use App\Models\SssTable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SssTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ssstables = SssTable::all();
        return view('ssstable.index', compact('ssstables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ssstable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bracket' => 'required',
            'rangel' => 'required',
            'rangeh' => 'required',
            'salcredit' => 'required',
            'cosss' => 'required',
            'comcr' => 'required',
            'coec' => 'required',
            'empsss' => 'required',
            'empmcr' => 'required',
        ]);



        $input = $request->all();
        $input['ssscode'] = "_".strtoupper(Str::random(9));
        $input['totalcon'] = array_sum([
            $request->cosss,
            $request->comcr,
            $request->coec,
            $request->empsss,
            $request->empmcr,
        ]);



        SssTable::create($input);
        return redirect()->route('ssstables.index')->with('message', 'Sss Contribution Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SssTable $sssTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SssTable $ssstable)
    {
        return view('ssstable.edit', compact('ssstable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SssTable $ssstable)
    {
        $this->validate($request, [
            'bracket' => 'required',
            'rangel' => 'required',
            'rangeh' => 'required',
            'salcredit' => 'required',
            'cosss' => 'required',
            'comcr' => 'required',
            'coec' => 'required',
            'empsss' => 'required',
            'empmcr' => 'required',
        ]);



        $input = $request->all();
        $input['totalcon'] = array_sum([
            $request->cosss,
            $request->comcr,
            $request->coec,
            $request->empsss,
            $request->empmcr,
        ]);


        $ssstable->update($input);
        return redirect()->route('ssstables.index')->with('message', 'Sss Contribution Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SssTable $ssstable)
    {
        $ssstable->delete();
        return redirect()->route('ssstables.index')->with('message', 'Sss Contribution Deleted Successfully!');
    }
}
