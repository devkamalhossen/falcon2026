<?php

namespace App\Http\Controllers\v1\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Home\HomeBannerRequest;
use App\Models\Home\HomeBanner;
use App\Services\Backend\Home\HomeBannerService;
use Exception;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    protected HomeBannerService $service;

    public function __construct(HomeBannerService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $banners = $this->service->getBanners();
            return view('admin.banner.index', compact('banners'));
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
            return view('admin.banner.create');
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HomeBannerRequest $request)
    {
        try {
             $message = $this->service->storeBanner($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeBanner $banner)
    {
        try {
            return view('admin.banner.edit', compact('banner'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HomeBannerRequest $request, HomeBanner $banner)
    {
        try {
             $message = $this->service->updateBanner($request->validated(), $banner);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBanner $banner)
    {
       try {
            $message = $this->service->deleteBanner($banner);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(HomeBanner $banner)
    {
       try {
            $message = $this->service->updateStatus($banner);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
