<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FounderMessageRequest;
use App\Models\FounderMessage;
use App\Services\Backend\CMS\FounderMessageService;
use Exception;
use Illuminate\Http\Request;

class FounderMessageController extends Controller
{
     public function __construct(protected FounderMessageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $pageData = $this->service->getContent();
            return view('admin.founder-message.index', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(FounderMessageRequest $request, FounderMessage $founder_message)
    {
        try {
            $message = $this->service->updateContent($request->validated(), $founder_message);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
