<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GalleryCategoryRequest;
use App\Models\GalleryCategory;
use App\Services\Backend\CMS\GalleryCategoryService;
use Exception;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
     protected GalleryCategoryService $service;

    public function __construct(GalleryCategoryService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = $this->service->getCategories();
            $gallery_category = null;
            return view('admin.gallery-category.index', compact('categories', 'gallery_category'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryCategoryRequest $request)
    {
        try {
            $message = $this->service->storeCategory($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryCategory $gallery_category)
    {
        try {
            $categories = $this->service->getCategories();
            return view('admin.gallery-category.index', compact('gallery_category', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryCategoryRequest $request, GalleryCategory $gallery_category)
    {
        try {
            $message = $this->service->updateCategory($request->validated(), $gallery_category);
            return redirect()->route('gallery-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryCategory $gallery_category)
    {
        try {
            $message = $this->service->destroyGallery($gallery_category);
            return redirect()->route('gallery-category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(GalleryCategory $gallery_category)
    {
        try {
            $message = $this->service->updateStatus($gallery_category);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
