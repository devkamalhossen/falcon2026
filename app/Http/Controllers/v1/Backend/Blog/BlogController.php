<?php

namespace App\Http\Controllers\v1\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BlogRequest;
use App\Models\Blog;
use App\Services\Backend\Blog\BlogCategoryService;
use App\Services\Backend\Blog\BlogService;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(protected BlogService $service, protected BlogCategoryService $categoryService)
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
            $blogs = $this->service->getBlogs();
            return view('admin.blog.index', compact('blogs'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        try {
            $categories = $this->categoryService->getActiveCategory();
            return view('admin.blog.create', compact('categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {

        try {
            $message = $this->service->storeBlog($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        try {
            $categories = $this->categoryService->getActiveCategory();
            return view('admin.blog.edit', compact('blog', 'categories'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $message = $this->service->updateBlog($request->validated(), $blog);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $message = $this->service->deleteBlog($blog);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Blog $blog)
    {
        try {
            $message = $this->service->updateStatus($blog);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
