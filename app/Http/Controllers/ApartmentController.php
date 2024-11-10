<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\ApartmentCategory;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::with('building', 'category')  // Eager load both 'building' and 'category'
        ->orderBy('apartment_number') // Order by apartment number
        ->get();
    
    return view('pages.apartment.index', compact('apartments'));
    
    }

    public function create()
    {
        $buildings = Building::where('status', 1)->get();
        $categorys = ApartmentCategory::where('status', 1)->get();
        return view('pages.apartment.create', compact('buildings','categorys'));
    }

    public function store(Request $request)
    {//dd('category_id');
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'category_id' => 'required',
            'apartment_number' => [
                'required',
                'string',
                Rule::unique('apartments')->where(function ($query) use ($request) {
                    return $query->where('building_id', $request->building_id);
                }),
            ],
            'owner_name' => 'required|string',
            'mobile_no' => 'required|string',
        ]);

        Apartment::create($request->all());

        // Increment the total_apartment count for the building
        Building::where('id', $request->building_id)->increment('total_apartment');

        return redirect()->route('apartment.index')->with('success', 'Apartment created successfully!');
    }

    public function edit(request $request, $id)
    {
        $buildings = Building::where('status', 1)->get();
        $apartment = Apartment::findOrFail($id);
        $categorys = ApartmentCategory::where('status', 1)->get();
        return view('pages.apartment.edit', compact('apartment', 'buildings','categorys'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'category_id' => 'required',
            'apartment_number' => 'required',
            'owner_name' => 'required',
            'mobile_no' => 'required',
        ]);

        $apartment = Apartment::findOrFail($id);
        $apartment->update($request->all());

        return redirect()->route('apartment.index')->with('success', 'Apartment updated successfully!');
    }

    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return response()->json(['success' => 'success']);
    }

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function statusChange($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->status = $apartment->status == 1 ? 0 : 1;
        $apartment->save();

        return response()->json(['success' => 'success']);
    }
}
