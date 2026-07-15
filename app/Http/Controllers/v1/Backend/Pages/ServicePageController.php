<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServicePageRequest;
use App\Models\Pages\PageService;
use App\Services\Backend\Service\ServiceManageService;
use Exception;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
     public function __construct(protected ServiceManageService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getPageContent();
            return view('admin.pages.service', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(ServicePageRequest $request, PageService $service)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $service);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
