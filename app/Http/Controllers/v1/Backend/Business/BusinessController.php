<?php

namespace App\Http\Controllers\v1\Backend\Business;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BusinessRequest;
use App\Models\Business;
use App\Services\Backend\Business\BusinessCategoryService;
use App\Services\Backend\Business\BusinessService;
use Exception;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    protected BusinessService $service;
    protected BusinessCategoryService $categoryService;

    public function __construct(BusinessService $service, BusinessCategoryService $categoryService)
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
            $businesses = $this->service->getBusinesses();
            $business = null;
            $businessCategories = $this->categoryService->getActiveCategory();
            return view('admin.business.index', compact('businesses', 'business', 'businessCategories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request)
    {
        try {
            $message = $this->service->storeBusiness($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        try {
            $businesses = $this->service->getBusinesses();
            $businessCategories = $this->categoryService->getActiveCategory();
            return view('admin.business.index', compact('business', 'businesses', 'businessCategories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request, Business $business)
    {
        try {
            $message = $this->service->updateBusiness($request->validated(), $business);
            return redirect()->route('business.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        try {
            $message = $this->service->destroyBusiness($business);
            return redirect()->route('business.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Business $business)
    {
        try {
            $message = $this->service->updateStatus($business);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
