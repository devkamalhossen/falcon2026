<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use App\Services\Backend\Service\ServiceCategoryService;
use Exception;

class ServiceCategoryController extends Controller
{
    protected ServiceCategoryService $service;

    public function __construct(ServiceCategoryService $service)
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
            $service_category = null;
            return view('admin.service-category.index', compact('categories', 'service_category'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCategoryRequest $request)
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
    public function edit(ServiceCategory $service_category)
    {
        try {
            $categories = $this->service->getCategories();
            return view('admin.service-category.index', compact('service_category', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceCategoryRequest $request, ServiceCategory $service_category)
    {
        try {
            $message = $this->service->updateCategory($request->validated(), $service_category);
            return redirect()->route('service-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $service_category)
    {
        try {
            $message = $this->service->deleteCategory($service_category);
            return redirect()->route('service-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(ServiceCategory $service_category)
    {
        try {
            $message = $this->service->updateStatus($service_category);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
