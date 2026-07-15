<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceAreaRequest;
use App\Models\ServiceArea;
use App\Services\Backend\CMS\ServiceAreaService;
use Exception;
use Illuminate\Http\Request;

class ServiceAreaController extends Controller
{
    public function __construct(protected ServiceAreaService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $serviceAreas = $this->service->getServiceAreas();
            return view('admin.service-area.index', compact('serviceAreas'));
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
            return view('admin.service-area.create');
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceAreaRequest $request)
    {
        try {
            $message = $this->service->storeServiceArea($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceArea $service_area)
    {
         try {
            return view('admin.service-area.edit', compact('service_area'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceAreaRequest $request, ServiceArea $service_area)
    {
        try {
            $message = $this->service->updateServiceArea($request->validated(), $service_area);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceArea $service_area)
    {
        try {
            $message = $this->service->deleteServiceArea($service_area);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(ServiceArea $service_area)
    {
        try {
            $message = $this->service->updateStatus($service_area);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
