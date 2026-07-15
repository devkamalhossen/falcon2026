<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Services\Backend\CMS\ManageCustomerMessageService;
use Exception;
use Illuminate\Http\Request;

class ManageCustomerMessageController extends Controller
{

    protected ManageCustomerMessageService $service;

    public function __construct(ManageCustomerMessageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $messages = $this->service->getMessages();
            return view('admin.query.index', compact('messages'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
