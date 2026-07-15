<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ContactPageRequest;
use App\Models\Pages\PageContact;
use App\Services\Backend\CMS\ContactService;
use Exception;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
     public function __construct(protected ContactService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getContactPageContent();
            return view('admin.pages.contact', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(ContactPageRequest $request, PageContact $contact)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $contact);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
