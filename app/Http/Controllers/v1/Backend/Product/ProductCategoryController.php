<?php

namespace App\Http\Controllers\v1\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCategoryRequest;
use App\Models\ProductCategory;
use App\Services\Backend\Product\ProductCategoryService;
use Exception;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected ProductCategoryService $service;

    public function __construct(ProductCategoryService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = $this->service->getCategories();
            $product_category = null;
            return view('admin.product-category.index', compact('categories', 'product_category'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        try {
            $message = $this->service->storeCategory($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $product_category)
    {
        try {
            $categories = $this->service->getCategories();
            return view('admin.product-category.index', compact('product_category', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $product_category)
    {
        try {
            $message = $this->service->updateCategory($request->validated(), $product_category);
            return redirect()->route('product-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $product_category)
    {
        try {
            $message = $this->service->destroyCategory($product_category);
           return redirect()->route('product-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(ProductCategory $product_category)
    {
        try {
            $message = $this->service->updateStatus($product_category);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
