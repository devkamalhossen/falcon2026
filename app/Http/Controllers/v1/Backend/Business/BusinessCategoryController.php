<?php

namespace App\Http\Controllers\v1\Backend\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BusinessCategoryRequest;
use App\Models\BusinessCategory;
use App\Services\Backend\Business\BusinessCategoryService;
use Exception;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    protected BusinessCategoryService $service;

    public function __construct(BusinessCategoryService $service)
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
            $business_category = null;
            return view('admin.business.category', compact('categories', 'business_category'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessCategoryRequest $request)
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
    public function edit(BusinessCategory $business_category)
    {
        try {
            $categories = $this->service->getCategories();
            return view('admin.business.category', compact('business_category', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessCategoryRequest $request, BusinessCategory $business_category)
    {
        try {
            $message = $this->service->updateCategory($request->validated(), $business_category);
            return redirect()->route('business-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessCategory $business_category)
    {
        try {
            $message = $this->service->deleteCategory($business_category);
            return redirect()->route('business-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(BusinessCategory $business_category)
    {
        try {
            $message = $this->service->updateStatus($business_category);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
