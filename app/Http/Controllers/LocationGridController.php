<?php

namespace App\Http\Controllers;

use App\Models\LocationGrid;

use Illuminate\Http\Request;

class LocationGridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = LocationGrid::latest()->paginate(10);
        return view('location_grid.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location_grid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:business_categories',
            'description' => 'nullable|string',
        ]);

        LocationGrid::create($validated);

        return redirect('/location-grid')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LocationGrid $category)
    {
        return view('location_grid.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {

    $category =  LocationGrid::find($id);
        return view('location_grid.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        LocationGrid::where('id',$id)->update($validated);

        return redirect('/location-grid')->with('success', 'Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        echo $id;
        
       /*  LocationGrid::where('id',$id)->delete();

        return redirect('/location-grid')->with('success', 'Category deleted successfully'); */
    }
}
