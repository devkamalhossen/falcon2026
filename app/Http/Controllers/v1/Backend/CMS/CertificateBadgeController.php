<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CertificateBadgeRequest;
use App\Models\CertificateBadge;
use App\Services\Backend\CMS\CertificateBadgeService;
use Exception;
use Illuminate\Http\Request;

class CertificateBadgeController extends Controller
{
     protected CertificateBadgeService $service;

    public function __construct(CertificateBadgeService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $certificateBadges = $this->service->getCertificateBadges();
            $certificate_badge = null;
            return view('admin.certificate-badge.index', compact('certificateBadges','certificate_badge'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateBadgeRequest $request)
    {
         try {
            $message = $this->service->storeCertificateBadge($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CertificateBadge $certificate_badge)
    {
        try {
             $certificateBadges = $this->service->getCertificateBadges();
            return view('admin.certificate-badge.index', compact('certificate_badge','certificateBadges'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateBadgeRequest $request, CertificateBadge $certificate_badge)
    {
         try {
            $message = $this->service->updateCertificateBadge($request->validated(), $certificate_badge);
            return redirect()->route('certificate-badge.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificateBadge $certificate_badge)
    {
        try {
            $message = $this->service->destroyCertificateBadge($certificate_badge);
            return redirect()->route('certificate-badge.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(CertificateBadge $certificate_badge)
    {
        try {
            $message = $this->service->updateStatus($certificate_badge);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
