<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TeamRequest;
use App\Models\Team;
use App\Services\Backend\CMS\TeamService;
use App\Services\Backend\CMS\TeamTypeService;
use Exception;

class TeamController extends Controller
{
    protected TeamService $service;
    protected TeamTypeService $typeTypeService;
    public function __construct(TeamService $service,  TeamTypeService $typeTypeService)
    {
        $this->service = $service;
        $this->typeTypeService =  $typeTypeService;;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $teams = $this->service->getTeams();
            return view('admin.team.index', compact('teams'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $activeTeamTypes = $this->typeTypeService->getActiveTypes();
            return view('admin.team.create', compact('activeTeamTypes'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        try {
            $message = $this->service->storeTeam($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        try {
            $activeTeamTypes = $this->typeTypeService->getActiveTypes();
            return view('admin.team.edit', compact('team','activeTeamTypes' ));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        try {
            $message = $this->service->updateTeam($request->validated(), $team);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        try {
            $message = $this->service->deleteTeam($team);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Team $team)
    {
        try {
            $message = $this->service->updateStatus($team);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
