<?php

namespace App\Http\Controllers;

use App\Models\businessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = businessCategory::latest()->paginate(10);
        return view('business_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business_category.create');
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

        businessCategory::create($validated);

        return redirect('/business-categories')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(businessCategory $category)
    {
        return view('business_category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {

    $category =  businessCategory::find($id);
        return view('business_category.edit', compact('category'));
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

        businessCategory::where('id',$id)->update($validated);

        return redirect('/business-categories')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        echo $id;
        
       /*  businessCategory::where('id',$id)->delete();

        return redirect('/business-categories')->with('success', 'Category deleted successfully'); */
    }
}
