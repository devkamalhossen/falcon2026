<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AchievementSliderRequest;
use App\Models\AchievementSlider;
use App\Services\Backend\CMS\AchievementSliderService;
use Exception;

class AchievementSliderController extends Controller
{
   protected AchievementSliderService $service;

    public function __construct(AchievementSliderService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sliders = $this->service->getSliders();
            $slider = null;
            return view('admin.about.achievement-slider', compact('sliders', 'slider'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AchievementSliderRequest $request)
    {
         try {
            $message = $this->service->storeSlider($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AchievementSlider $slider)
    {
        try {
             $sliders = $this->service->getSliders();
            return view('admin.about.achievement-slider', compact('slider', 'sliders'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AchievementSliderRequest $request, AchievementSlider $slider)
    {
         try {
            $message = $this->service->updateSlider($request->validated(), $slider);
            return redirect()->route('slider.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AchievementSlider $slider)
    {
        try {
            $message = $this->service->destroySlider($slider);
            return redirect()->route('slider.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(AchievementSlider $slider)
    {
        try {
            $message = $this->service->updateStatus($slider);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
