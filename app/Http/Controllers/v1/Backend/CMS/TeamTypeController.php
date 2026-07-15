<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TeamTypeRequest;
use App\Models\TeamType;
use App\Services\Backend\CMS\TeamTypeService;
use Exception;
use Illuminate\Http\Request;

class TeamTypeController extends Controller
{
     protected TeamTypeService $service;

    public function __construct(TeamTypeService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $types = $this->service->getTeamTypes();
            $teamType = null;
            return view('admin.team-type.index', compact('types','teamType'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamTypeRequest $request)
    {
         try {
            $message = $this->service->storeTeamType($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamType $teamType)
    {
        try {
             $types = $this->service->getTeamTypes();
            return view('admin.team-type.index', compact('teamType','types'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamTypeRequest $request, TeamType $teamType)
    {
         try {
            $message = $this->service->updateTeamType($request->validated(), $teamType);
            return redirect()->route('team-type.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamType $teamType)
    {
        try {
            $message = $this->service->destroyTeamType($teamType);
            return redirect()->route('team-type.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(TeamType $teamType)
    {
        try {
            $message = $this->service->updateStatus($teamType);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
