<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
public function index()
{
    $categories = Category::all(['id', 'title', 'description', 'status']);
    return response()->json($categories);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|integer|in:0,1,2', // Validate status if provided
    ]);

    $category = Category::create($validated);
    
    return response()->json([
        'message' => 'Task Created Successfully!!',
        'category' => $category
    ]);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
   
public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|integer|in:0,1,2', // Validate status if provided
    ]);

    $category->fill($validated)->save();

    return response()->json([
        'message' => 'Task Updated Successfully!!',
        'category' => $category
    ]);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message'=>'Task Deleted Successfully!!'
        ]);
    }
}