<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $products,
        ], 200);
    }


    public function show(string $id)
    {
        $products = Product::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $products,
        ], 200);
    }
}
