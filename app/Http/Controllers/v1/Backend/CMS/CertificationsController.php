<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CertificationsRequest;
use App\Models\Certifications;
use App\Services\Backend\CMS\CertificationsService;
use Exception;

class CertificationsController extends Controller
{
     protected CertificationsService $service;

    public function __construct(CertificationsService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $certifications = $this->service->getCertificates();
            $certification = null;
            return view('admin.certifications.index', compact('certifications','certification'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificationsRequest $request)
    {
         try {
            $message = $this->service->storeCertificate($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certifications $certification)
    {
        try {
             $certifications = $this->service->getCertificates();
            return view('admin.certifications.index', compact('certification','certifications'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificationsRequest $request,Certifications $certification)
    {
         try {
            $message = $this->service->updateCertificate($request->validated(), $certification);
            return redirect()->route('certification.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certifications $certification)
    {
        try {
            $message = $this->service->destroyCertificate($certification);
            return redirect()->route('certification.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Certifications $certification)
    {
        try {
            $message = $this->service->updateStatus($certification);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
