<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GoogleReviewRequest;
use App\Models\GoogleReview;
use App\Services\Backend\CMS\GoogleReviewService;
use Exception;
use Illuminate\Http\Request;

class GoogleReviewController extends Controller
{
  protected GoogleReviewService $service;

    public function __construct(GoogleReviewService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $reviews = $this->service->getReviews();
            $google_review = null;
            return view('admin.google-review.index', compact('reviews', 'google_review'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(GoogleReviewRequest $request)
    {
        try {
            $message = $this->service->storeReview($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GoogleReview $google_review)
    {
        try {
            $reviews = $this->service->getReviews();
            return view('admin.google-review.index', compact('google_review', 'reviews'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GoogleReviewRequest $request, GoogleReview $google_review)
    {
        try {
            $message = $this->service->updateReview($request->validated(), $google_review);
            return redirect()->route('google-review.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GoogleReview $google_review)
    {
        try {
            $message = $this->service->destroyReview($google_review);
            return redirect()->route('google-review.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(GoogleReview $google_review)
    {
        try {
            $message = $this->service->updateStatus($google_review);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
