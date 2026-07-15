<?php

namespace App\Http\Controllers\v1\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Product;
use App\Services\Backend\Product\ProductCategoryService;
use App\Services\Backend\Product\ProductService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $service;
    protected ProductCategoryService $categoryService;

    public function __construct(ProductService $service, ProductCategoryService $categoryService)
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = $this->service->getProducts();
            $product = null;
            $productCategories = $this->categoryService->activeCategories();
            return view('admin.product.index', compact('products', 'product', 'productCategories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $message = $this->service->storeProduct($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        try {
            $products = $this->service->getProducts();
            $productCategories = $this->categoryService->activeCategories();
            return view('admin.product.index', compact('product', 'products', 'productCategories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
      
        try {
            $message = $this->service->updateProduct($request->validated(), $product);
            return redirect()->route('product.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $message = $this->service->destroyProduct($product);
           return redirect()->route('product.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Product $product)
    {
        try {
            $message = $this->service->updateStatus($product);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
