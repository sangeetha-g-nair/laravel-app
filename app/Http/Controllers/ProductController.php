<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();

        return response()->json([
            'status' => '200',
            'message' => 'success',
            'data' => $data
        ]);
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
        $this->validate($request,
        [
            'item' => 'required',
            'category' => 'required',
            'image' => 'required',
            'desc' => 'required'
        ]);

        $image = $request->file('image')->store('images', 'public');
        $product = Product::create([
            'image' => $image,
            'category' => $request->category,
            'item' => $request->item,
            'desc' => $request->desc

        ]);

        return response()->json([
            'status' => '200',
            'message' => 'uploaded successfully',
            'data' => $product
        ]);
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
}
