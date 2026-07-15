<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\OurStoryRequest;
use App\Models\Pages\PageOurStory;
use App\Services\Backend\CMS\OurStoryService;
use Exception;
use Illuminate\Http\Request;

class OurStoryPageController extends Controller
{
    public function __construct(protected OurStoryService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getPageContent();
            return view('admin.pages.our-story', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(OurStoryRequest $request, PageOurStory $our_story)
    {
        //try {
            $message = $this->service->updatePageContent($request->validated(), $our_story);
            return back()->with('success', $message);
        //} catch (Exception $e) {
         //   return abort($e->getCode());
        //}
    }
}
