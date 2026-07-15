<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceFAQRequest;
use App\Models\ServiceFAQ;
use App\Services\Backend\Service\ServiceFAQService;
use Exception;

class ServiceFAQController extends Controller
{
     protected ServiceFAQService $service;

    public function __construct(ServiceFAQService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $service)
    {
        try {
            $faqs = $this->service->getFAQs($service);
            $faq = null;
            return view('admin.service.faq', compact('faqs', 'faq', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFAQRequest $request, int $service)
    {
        try {
            $message = $this->service->storeFAQ($service, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $service, ServiceFAQ $faq)
    {
        try {
            $faqs = $this->service->getFAQs($service);
            return view('admin.service.faq', compact('faq', 'faqs', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $service, ServiceFAQRequest $request, ServiceFAQ $faq)
    {
        try {
            $message = $this->service->updateFAQ($service, $request->validated(), $faq);
            return redirect()->route('faq.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $service, ServiceFAQ $faq)
    {
        try {
            if ($service != $faq->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyFAQ($faq);
            return redirect()->route('faq.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $service, ServiceFAQ $faq)
    {
        try {
            if ($service != $faq->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($faq);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
