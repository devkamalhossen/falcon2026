<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceDescriptionRequest;
use App\Models\ServiceDescription;
use App\Services\Backend\Service\ServiceDescriptionService;
use Exception;

class ServiceDescriptionController extends Controller
{
     protected ServiceDescriptionService $service;

    public function __construct(ServiceDescriptionService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $service)
    {
        try {
            $descriptions = $this->service->getDescription($service);
            $description = null;
            return view('admin.service.description', compact('descriptions', 'description', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceDescriptionRequest $request, int $service)
    {
        try {
            $message = $this->service->storeDescription($service, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $service, ServiceDescription $description)
    {
        try {
            $descriptions = $this->service->getDescription($service);
            // dd($description);
            return view('admin.service.description', compact('description', 'descriptions', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $service, ServiceDescriptionRequest $request, ServiceDescription $description)
    {
        try {
            $message = $this->service->updateDescription($service, $request->validated(), $description);
            return redirect()->route('description.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $service, ServiceDescription $description)
    {
        try {
            if ($service != $description->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyDescription($description);
            return redirect()->route('description.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $service, ServiceDescription $description)
    {
        try {
            if ($service != $description->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($description);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
