<?php

namespace App\Http\Controllers\v1\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceGalleryRequest;
use App\Models\Gallery;
use App\Services\Backend\Service\ServiceGalleryService;
use Exception;
use Illuminate\Http\Request;

class ServiceGalleryController extends Controller
{
    protected ServiceGalleryService $service;

    public function __construct(ServiceGalleryService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $service)
    {
        try {
            $galleries = $this->service->getGalleries($service);
            $gallery = null;
            return view('admin.service.gallery', compact('galleries', 'gallery', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceGalleryRequest $request, int $service)
    {
        try {
            $message = $this->service->storeGallery($service, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $service, Gallery $gallery)
    {
        try {
            $galleries = $this->service->getGalleries($service);
            return view('admin.service.gallery', compact('gallery', 'galleries', 'service'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $service, ServiceGalleryRequest $request, Gallery $gallery)
    {
        try {
            $message = $this->service->updateGallery($service, $request->validated(), $gallery);
            return redirect()->route('gallery.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $service, Gallery $gallery)
    {
        try {
            if ($service != $gallery->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyGallery($gallery);
            return redirect()->route('gallery.index', ['service' => $service])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $service, Gallery $gallery)
    {
        try {
            if ($service != $gallery->service_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($gallery);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
