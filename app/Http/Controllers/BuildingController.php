<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('pages.building.index', compact('buildings'));
    }

    public function create()
    {
        return view('pages.building.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'road' => 'required',
            'owner_name' => 'required',
            'mobile_no' => 'required',
        ]);

        Building::create($request->all());
        return redirect()->route('building.index')->with('success', 'Building created successfully!');
    }
    
    public function edit(request $request, $id)
    {
        $building = Building::findOrFail($id);
        return view('pages.building.edit', compact('building'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'road' => 'required|string|max:255',
            'owner_name' => 'required',
            'mobile_no' => 'required',
        ]);

        $building = Building::findOrFail($id);
        $building->update($request->all());

        return redirect()->route('building.index')->with('success', 'Building updated successfully!');
    }

    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $building->delete();
        return response()->json(['success' => 'success']);
    }

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function statusChange($id)
    {
        $building = Building::findOrFail($id);
        $building->status = $building->status == 1 ? 0 : 1;
        $building->save();

        return response()->json(['success' => 'success']);
    }
}
