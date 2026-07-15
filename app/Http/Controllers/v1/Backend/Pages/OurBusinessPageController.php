<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\OurBusinessPageRequest;
use App\Models\Pages\PageOurBusiness;
use App\Services\Backend\Business\BusinessService;
use Exception;
use Illuminate\Http\Request;

class OurBusinessPageController extends Controller
{
    public function __construct(protected BusinessService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getBusinessPageContent();
            return view('admin.pages.our-business', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(OurBusinessPageRequest $request, PageOurBusiness $our_business)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $our_business);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
