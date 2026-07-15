<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Services\Backend\Service\ServiceCategoryService;
use App\Services\Backend\Service\ServiceManageService;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected ServiceManageService $service;
    protected ServiceCategoryService $serviceCategory;

    public function __construct(ServiceManageService $service, ServiceCategoryService $serviceCategory)
    {
        $this->service = $service;
        $this->serviceCategory = $serviceCategory;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services = $this->service->getServices();
            return view('admin.service.index', compact('services'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categories = $this->serviceCategory->getActiveCategory();
            return view('admin.service.create', compact('categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {

        try {
            $message = $this->service->storeService($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        try {
            $categories = $this->serviceCategory->getActiveCategory();
            return view('admin.service.edit', compact('service', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        try {
            $message = $this->service->updateService($request->validated(), $service);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $message = $this->service->deleteService($service);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Service $service)
    {
        try {
            $message = $this->service->updateStatus($service);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
