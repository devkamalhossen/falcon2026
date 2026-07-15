<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ImportRequest;
use App\Models\Importer;
use App\Services\Backend\CMS\ImporterService;
use Exception;

class ImportController extends Controller
{
    protected ImporterService $service;

    public function __construct(ImporterService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $importers = $this->service->getImporters();
            $importer = null;
            return view('admin.importer.index', compact('importers', 'importer'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ImportRequest $request)
    {
        try {
            $message = $this->service->storeImporter($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Importer $importer)
    {
        try {
            $importers = $this->service->getImporters();
            return view('admin.importer.index', compact('importer', 'importers'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImportRequest $request, Importer $importer)
    {
        try {
            $message = $this->service->updateImporter($request->validated(), $importer);
            return redirect()->route('importer.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Importer $importer)
    {
        try {
            $message = $this->service->destroyImporter($importer);
            return redirect()->route('importer.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Importer $importer)
    {
        try {
            $message = $this->service->updateStatus($importer);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
