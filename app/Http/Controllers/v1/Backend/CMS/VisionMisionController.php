<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VisionMissionRequest;
use App\Models\VisionMission;
use App\Services\Backend\CMS\VisionMissionService;
use Exception;
use Illuminate\Http\Request;

class VisionMisionController extends Controller
{
    protected VisionMissionService $service;

    public function __construct(VisionMissionService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $visionMissions = $this->service->getVisions();
            $vision = null;
            return view('admin.vision-mission.index', compact('visionMissions', 'vision'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(VisionMissionRequest $request)
    {
        try {
            $message = $this->service->storeVision($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisionMission $vision)
    {
        try {
            $visionMissions = $this->service->getVisions();
            return view('admin.vision-mission.index', compact('vision', 'visionMissions'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisionMissionRequest $request, VisionMission $vision)
    {
        try {
            $message = $this->service->updateVision($request->validated(), $vision);
            return redirect()->route('vision.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisionMission $vision)
    {
        try {
            $message = $this->service->deleteVision($vision);
            return redirect()->route('vision.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(VisionMission $vision)
    {
        try {
            $message = $this->service->updateStatus($vision);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
