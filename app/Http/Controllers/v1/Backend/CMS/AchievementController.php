<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AcheivementRequest;
use App\Http\Requests\Backend\AchievementRequest;
use App\Models\Acheivement;
use App\Models\Achievement;
use App\Services\Backend\CMS\AchievementService;
use Exception;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    protected AchievementService $service;
    public function __construct(AchievementService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $achievements = $this->service->getAchievements();
            $achievement = null;
            return view('admin.about.achievement', compact('achievements', 'achievement'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AchievementRequest $request)
    {
        try {
            $message = $this->service->storeAchievement($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        try {
            $achievements = $this->service->getAchievements();
            return view('admin.about.achievement', compact('achievement', 'achievements'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AchievementRequest $request, Achievement $achievement)
    {
        try {
            $message = $this->service->updateAchievement($request->validated(), $achievement);
            return redirect()->route('achievement.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        try {
            $message = $this->service->destroyAchievement($achievement);
             return redirect()->route('achievement.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Achievement $achievement)
    {
        try {
            $message = $this->service->updateStatus($achievement);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
