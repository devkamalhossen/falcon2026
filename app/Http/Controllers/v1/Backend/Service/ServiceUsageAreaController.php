<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceUsageAreaRequest;
use App\Models\ServiceUsageArea;
use App\Services\Backend\Service\ServiceUsageAreaService;
use Exception;
use Illuminate\Http\Request;

class ServiceUsageAreaController extends Controller
{
    protected ServiceUsageAreaService $service;

    public function __construct(ServiceUsageAreaService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $service)
    {
        try {
            $usageAreas = $this->service->getUsageAreas($service);
            $usage_area = null;
            return view('admin.service.usage-area', compact('usageAreas', 'usage_area', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceUsageAreaRequest $request, int $service)
    {
        try {
            $message = $this->service->storeUsageArea($service, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $service, ServiceUsageArea $usage_area)
    {
        try {
            $usageAreas = $this->service->getUsageAreas($service);
            return view('admin.service.usage-area', compact('usage_area', 'usageAreas', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $service, ServiceUsageAreaRequest $request, ServiceUsageArea $usage_area)
    {
        try {
            $message = $this->service->updateUsageArea($service, $request->validated(), $usage_area);
            return redirect()->route('usage-area.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $service, ServiceUsageArea $usage_area)
    {
        try {
            if ($service != $usage_area->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyUsageArea($usage_area);
            return redirect()->route('usage-area.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $service, ServiceUsageArea $usage_area)
    {
        try {
            if ($service != $usage_area->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($usage_area);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
