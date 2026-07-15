<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GalleryRequest;
use App\Models\Gallery;
use App\Services\Backend\CMS\GalleryCategoryService;
use App\Services\Backend\CMS\GalleryService;
use Exception;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected GalleryService $service;
    protected GalleryCategoryService $categoryService;

    public function __construct(GalleryService $service, GalleryCategoryService $categoryService)
    {
        $this->service = $service;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $galleries = $this->service->getGalleries();
            $gallery = null;
            $categories = $this->categoryService->getActiveGalleryCategories();
            return view('admin.gallery.index', compact('galleries', 'gallery', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        try {
            $message = $this->service->storeGallery($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        try {
            $galleries = $this->service->getGalleries();
            $categories = $this->categoryService->getActiveGalleryCategories();
            return view('admin.gallery.index', compact('gallery', 'galleries', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        try {
            $message = $this->service->updateGallery($request->validated(), $gallery);
            return redirect()->route('galleries.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            $message = $this->service->destroyGallery($gallery);
            return redirect()->route('galleries.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Gallery $gallery)
    {
        try {
            $message = $this->service->updateStatus($gallery);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
