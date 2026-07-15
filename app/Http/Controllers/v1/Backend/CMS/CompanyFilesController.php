<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CompanyFileRequest;
use App\Models\CompanyFile;
use App\Services\Backend\CMS\CompanyFileService;
use Exception;
use Illuminate\Http\Request;

class CompanyFilesController extends Controller
{
    public function __construct(protected CompanyFileService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $companyFiles = $this->service->getFiles();
            return view('admin.company-file.index', compact('companyFiles'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.company-file.create');
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyFileRequest $request)
    {

        try {
            $message = $this->service->storeFile($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyFile $company_file)
    {
        try {
            return view('admin.company-file.edit', compact('company_file'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyFileRequest $request, CompanyFile $company_file)
    {
        try {
            $message = $this->service->updateFile($request->validated(), $company_file);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyFile $company_file)
    {
        try {
            $message = $this->service->deleteFile($company_file);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(CompanyFile $company_file)
    {
        try {
            $message = $this->service->updateStatus($company_file);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
