<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ClientRequest;
use App\Models\Client;
use App\Services\Backend\CMS\ClientService;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected ClientService $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clients = $this->service->getClients();
            $client = null;
            return view('admin.client.index', compact('clients','client'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
         try {
            $message = $this->service->storeClient($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        try {
             $clients = $this->service->getClients();
            return view('admin.client.index', compact('client','clients'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
         try {
            $message = $this->service->updateClient($request->validated(), $client);
            return redirect()->route('client.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $message = $this->service->destroyClient($client);
            return redirect()->route('client.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Client $client)
    {
        try {
            $message = $this->service->updateStatus($client);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
