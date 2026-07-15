<?php

namespace App\Http\Controllers\v1\Backend\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProjectRequest;
use App\Models\Project;
use App\Services\Backend\Project\ProjectService;
use App\Services\Backend\Service\ServiceManageService;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected ProjectService $service;
    protected ServiceManageService $serviceManage;
    public function __construct(ProjectService $service, ServiceManageService $serviceManage)
    {
        $this->service = $service;
        $this->serviceManage = $serviceManage;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = $this->service->getProjects();
            return view('admin.project.index', compact('projects'));
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
            $services = $this->serviceManage->getActiveServices();
            return view('admin.project.create', compact('services'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {

        try {
            $message = $this->service->storeProject($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
           return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        try {
            $services = $this->serviceManage->getActiveServices();
            return view('admin.project.edit', compact('project', 'services'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        try {
            $message = $this->service->updateProject($request->validated(), $project);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $message = $this->service->deleteProject($project);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Project $project)
    {
        try {
            $message = $this->service->updateStatus($project);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
