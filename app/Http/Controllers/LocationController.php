<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'loc_code' => 'required',
            'location' => 'required'
        ]);

        array_map('strtoupper', $request->all());

        dd($request->all());

        return redirect()->route('location.index')->with('message', 'Location Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
           'location' => 'required|unique:location,location,'.$location->loc_code.',loc_code'
        ]);

        $data = [
            'location' => strtoupper($request->location)
        ];

        $location->update($data);

        return redirect()->route('locations.index')->with('message', 'Location Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')->with('message', 'Location Deleted Successfully!');
    }
}
