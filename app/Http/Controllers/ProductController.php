<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display all products.
     * Include logic for empty product list using isEmpty() method
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json($products, Response::HTTP_OK);
    }

    /**
     * Display a specific product.
     * Using find() method here to show custom json message if product not found instead of findOrFail() method
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully',
            'product' => $product,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created product.
     * Include logic for validation using validate() method to ensure required fields are not empty
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated_product = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $product = Product::create($validated_product);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'product' => $product,
        ], Response::HTTP_CREATED);
    }

    /**
     * Update a specific product.
     * Include logic for validation using validate() method to ensure required fields are not empty
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $validated_product = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product->update($validated_product);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'product' => $product,
        ], Response::HTTP_OK);
    }

    /**
     * Delete a specific product.
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
            'product' => $product,
        ], Response::HTTP_OK);
    }
}
