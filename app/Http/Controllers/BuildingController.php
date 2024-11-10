<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Road;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::with(['road'])->get();
        return view('pages.building.index', compact('buildings'));
    }

    public function create()
    {
        $roads = Road::all();
        return view('pages.building.create', compact('roads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'road_id' => 'required',
            'contact_person' => 'required',
            'mobile_no' => 'required',
        ]);

        $building = new Building();
        $building->name = $request->name;
        $building->road_id = $request->road_id;
        $building->contact_person = $request->contact_person;
        $building->mobile_no = $request->mobile_no;
        $building->save();
        return redirect()->route('building.index')->with('success', 'Building created successfully!');
    }
    
    public function edit(request $request, $id)
    {
        $building = Building::findOrFail($id);
        $roads = Road::all();
        return view('pages.building.edit', compact('building', 'roads'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'road_id' => 'required|string|max:255',
            'contact_person' => 'required',
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
