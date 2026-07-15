<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\WhyChoosePageRequest;
use App\Models\Pages\PageWhyChoose;
use App\Services\Backend\CMS\WhyChooseUsService;
use Exception;
use Illuminate\Http\Request;

class WhyChoosePageController extends Controller
{
    public function __construct(protected WhyChooseUsService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getWhyChoosePageContent();
            return view('admin.pages.whychoose', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(WhyChoosePageRequest $request, PageWhyChoose $why_choose)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $why_choose);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
