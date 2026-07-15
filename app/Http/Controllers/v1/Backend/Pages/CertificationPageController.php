<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CertificationPageRequest;
use App\Models\Pages\CertificatePage;
use App\Services\Backend\CMS\CertificationsService;
use Exception;
use Illuminate\Http\Request;

class CertificationPageController extends Controller
{
     public function __construct(protected CertificationsService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getCertificatePageContent();
            return view('admin.pages.certification', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(CertificationPageRequest $request, CertificatePage $certificate)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $certificate);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
