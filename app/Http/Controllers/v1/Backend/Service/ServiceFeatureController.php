<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceFeatureRequest;
use App\Models\ServiceFeature;
use App\Services\Backend\Service\ServiceFeatureService;
use Exception;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    protected ServiceFeatureService $service;

    public function __construct(ServiceFeatureService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $service)
    {
        try {
            $features = $this->service->getFeatures($service);
            $feature = null;
            return view('admin.service.feature', compact('features', 'feature', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFeatureRequest $request, int $service)
    {
        try {
            $message = $this->service->storeFeature($service, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $service, ServiceFeature $feature)
    {
        try {
            $features = $this->service->getFeatures($service);
            return view('admin.service.feature', compact('feature', 'features', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $service, ServiceFeatureRequest $request, ServiceFeature $feature)
    {
        try {
            $message = $this->service->updateFeature($service, $request->validated(), $feature);
            return redirect()->route('feature.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $service, ServiceFeature $feature)
    {
        try {
            if ($service != $feature->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyFeature($feature);
            return redirect()->route('feature.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $service, ServiceFeature $feature)
    {
        try {
            if ($service != $feature->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($feature);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
