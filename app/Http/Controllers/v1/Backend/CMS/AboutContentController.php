<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AboutContentRequest;
use App\Models\AboutContent;
use App\Services\Backend\CMS\AboutContentService;
use Exception;
use Illuminate\Http\Request;

class AboutContentController extends Controller
{
    public function __construct(protected AboutContentService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getAboutContent();
            return view('admin.about.about', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(AboutContentRequest $request, AboutContent $about_content)
    {
        try {
            $message = $this->service->updateAboutContent($request->validated(), $about_content);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
