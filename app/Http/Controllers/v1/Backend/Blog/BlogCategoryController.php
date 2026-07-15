<?php

namespace App\Http\Controllers\v1\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Services\Backend\Blog\BlogCategoryService;
use Exception;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    protected BlogCategoryService $service;

    public function __construct(BlogCategoryService $service)
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
            $category = null;
            return view('admin.blog-category.index', compact('categories', 'category'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCategoryRequest $request)
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
    public function edit(BlogCategory $category)
    {
        try {
            $categories = $this->service->getCategories();
            return view('admin.blog-category.index', compact('category', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCategoryRequest $request, BlogCategory $category)
    {
        try {
            $message = $this->service->updateCategory($request->validated(), $category);
            return redirect()->route('category.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $category)
    {
        try {
            $message = $this->service->deleteCategory($category);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(BlogCategory $category)
    {
        try {
            $message = $this->service->updateStatus($category);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
