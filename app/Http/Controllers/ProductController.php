<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\NoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        abort_if(! Auth::user()->can('product-view'), Response::HTTP_FORBIDDEN, "You do not have permission to read this product. If there's any issue, please contact your administrator.");
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'user' => Auth::user()->name,
                'role' => Auth::user()->getRoleNames(),
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully',
            'user' => Auth::user()->name,
            'role' => Auth::user()->getRoleNames(),
            'products' => $products,
        ], Response::HTTP_OK);
    }

    /**
     * Display a specific product.
     * Using find() method here to show custom json message if product not found instead of findOrFail() method
     * Include logic for authorization using abort_if() method to ensure user has permission to access this method
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        abort_if(! Auth::user()->can('product-view'), Response::HTTP_FORBIDDEN, "You do not have permission to read this product. If there's any issue, please contact your administrator.");

        $product = Product::find($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'user' => Auth::user()->name,
                'role' => Auth::user()->getRoleNames(),
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully',
            'user' => Auth::user()->name,
            'role' => Auth::user()->getRoleNames(),
            'product' => $product,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created product.
     * Include logic for validation using validate() method to ensure required fields are not empty
     * Include logic for authorization using abort_if() method to ensure user has permission to access this method
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        abort_if(! Auth::user()->can('product-create'), Response::HTTP_FORBIDDEN, "You do not have permission to create this product. If there's any issue, please contact your administrator.");

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
            'user' => Auth::user()->name,
            'role' => Auth::user()->getRoleNames(),
            'product' => $product,
        ], Response::HTTP_CREATED);
    }

    /**
     * Update a specific product.
     * Include logic for validation using validate() method to ensure required fields are not empty
     * Include logic for authorization using abort_if() method to ensure user has permission to access this method
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        abort_if(! Auth::user()->can('product-update'), Response::HTTP_FORBIDDEN, "You do not have permission to update this product. If there's any issue, please contact your administrator.");

        $product = Product::find($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'user' => Auth::user()->name,
                'role' => Auth::user()->getRoleNames(),
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
            'user' => Auth::user()->name,
            'role' => Auth::user()->getRoleNames(),
            'product' => $product,
        ], Response::HTTP_OK);
    }

    /**
     * Delete a specific product.
     * Include logic for authorization using abort_if() method to ensure user has permission to access this method
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id, NoService $noService)
    {
        if (! Auth::user()->can('product-delete')) {
            // 2. Get the sassy rejection reason
            $reason = $noService->getRejectionReason();

            return response()->json([
                'success' => false,
                'message' => 'You do not have permission to delete this product. Please contact your administrator.',
                'system_message' => "Message from admin: {$reason}",
                'user' => Auth::user()->name,
                'role' => Auth::user()->getRoleNames(),
            ], Response::HTTP_FORBIDDEN);
        }

        $product = Product::find($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'user' => Auth::user()->name,
                'role' => Auth::user()->getRoleNames(),
            ], Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
            'user' => Auth::user()->name,
            'role' => Auth::user()->getRoleNames(),
            'product' => $product,
        ], Response::HTTP_OK);
    }
}
