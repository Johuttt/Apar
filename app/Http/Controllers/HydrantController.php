<?php

namespace App\Http\Controllers;

use App\Models\Hydrant;
use App\Models\Location;
use Illuminate\Http\Request;

class HydrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hydrants = Hydrant::get();
        return view('dashboard.hydrant.index', compact('hydrants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('dashboard.hydrant.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'no_hydrant'=>'required|unique:hydrants',
            'location_id'=>'required',
            'zona'=>'nullable',
            'type'=>'required'
        ]);

        Hydrant::create($validate);
        return redirect()->route('data-hydrant.index')->with('success', "Data Hydrant {$validate['no_hydrant']} berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hydrant = Hydrant::findOrFail($id);
        $locations = Location::all();
        return view('dashboard.hydrant.edit', compact('hydrant', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hydrant = Hydrant::findOrFail($id);

        $validateData = $request->validate([
            'location_id'=>'required',
            'zona'=>'nullable',
            'type'=>'required'
        ]);

        $hydrant->update($validateData);

        return redirect()->route('data-hydrant.index')->with('success', 'Data berhasil di update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hydrant = Hydrant::find($id);
        $hydrant->delete();

        return redirect()->route('data-hydrant.index')->with('success', 'Data Hydrant berhasil dihapus');
    }
}