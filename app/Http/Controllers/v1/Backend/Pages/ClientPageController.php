<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ClientPageRequest;
use App\Models\Pages\PageClient;
use App\Services\Backend\CMS\ClientService;
use Exception;
use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    public function __construct(protected ClientService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getClientPageContent();
            return view('admin.pages.client', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(ClientPageRequest $request, PageClient $client)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $client);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
