<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CoreValueRequest;
use App\Models\CoreValue;
use App\Services\Backend\CMS\CoreValueService;
use Exception;

class CoreValueController extends Controller
{
    public function __construct(protected CoreValueService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $pageData = $this->service->getCoreValueContent();
            return view('admin.core-value.index', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(CoreValueRequest $request, CoreValue $core_value)
    {
        try {
            $message = $this->service->updateContent($request->validated(), $core_value);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
