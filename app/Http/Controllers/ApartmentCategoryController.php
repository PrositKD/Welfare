<?php

namespace App\Http\Controllers;

use App\Models\ApartmentCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApartmentCategoryController extends Controller
{
    public function index()
    {
        $categories = ApartmentCategory::orderBy('name')->get();
        return view('pages.apartmentCategory.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.apartmentCategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:apartment_categories,name',
            'description' => 'nullable|string',
            'bill' => 'nullable|numeric',  // Validate bill as numeric
            'status' => 'required|boolean', // Validate status as boolean
        ]);

        ApartmentCategory::create($request->all());

        return redirect()->route('apartment-category.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = ApartmentCategory::findOrFail($id);
        return view('pages.apartmentCategory.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ApartmentCategory::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('apartment_categories')->ignore($category->id),
            ],
            'description' => 'nullable|string',
            'bill' => 'nullable|numeric',  // Validate bill as numeric
            'status' => 'required|boolean', // Validate status as boolean
        ]);

        $category->update($request->all());

        return redirect()->route('apartment-category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = ApartmentCategory::findOrFail($id);
        $category->delete();

        return response()->json(['success' => 'success']);
    }
}
