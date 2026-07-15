<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceAreaPageRequest;
use App\Models\Pages\PageServiceArea;
use App\Services\Backend\CMS\ServiceAreaService;
use Exception;
use Illuminate\Http\Request;

class ServiceAreaPageController extends Controller
{
    public function __construct(protected ServiceAreaService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getServiceAreaPageContent();
            return view('admin.pages.service-area', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(ServiceAreaPageRequest $request, PageServiceArea $service_area)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $service_area);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
