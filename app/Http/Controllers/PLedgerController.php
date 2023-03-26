<?php

namespace App\Http\Controllers;

use App\Imports\PLedgerImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;

class PLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('p_ledger.import');
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

    public function importData(Request $request){
        $this->validate($request, [
            'file' => 'required'
        ]);
        $file = $request->file;
        $import = new PLedgerImport();

        Excel::import($import, $file);


        return redirect()->back()->with('message', 'Imported successfully!');

    }



}
