<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceBenefitRequest;
use App\Models\ServiceBenefit;
use App\Services\Backend\Service\ServiceBenefitService;
use Exception;
use Illuminate\Http\Request;

class ServiceBenefitController extends Controller
{
    protected ServiceBenefitService $service;

    public function __construct(ServiceBenefitService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $service)
    {
        try {
            $benefits = $this->service->getBenefits($service);
            $benefit = null;
            return view('admin.service.benefit', compact('benefits', 'benefit', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceBenefitRequest $request, int $service)
    {
        try {
            $message = $this->service->storeBenefit($service, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $service, ServiceBenefit $benefit)
    {
        try {
            $benefits = $this->service->getBenefits($service);
            return view('admin.service.benefit', compact('benefit', 'benefits', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $service, ServiceBenefitRequest $request, ServiceBenefit $benefit)
    {
        try {
            $message = $this->service->updateBenefit($service, $request->validated(), $benefit);
            return redirect()->route('benefit.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $service, ServiceBenefit $benefit)
    {
        try {
            if ($service != $benefit->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyBenefit($benefit);
            return redirect()->route('benefit.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $service, ServiceBenefit $benefit)
    {
        try {
            if ($service != $benefit->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($benefit);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
