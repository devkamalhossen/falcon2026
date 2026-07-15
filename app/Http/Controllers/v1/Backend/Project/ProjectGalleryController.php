<?php

namespace App\Http\Controllers\v1\Backend\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProjectGalleryRequest;
use App\Models\Gallery;
use App\Services\Backend\Project\ProjectGalleryService;
use Exception;
use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    protected ProjectGalleryService $service;

    public function __construct(ProjectGalleryService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $project)
    {
        try {
            $galleries = $this->service->getGalleries($project);
            $pgallery = null;
            return view('admin.project.gallery', compact('galleries', 'pgallery', 'project'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectGalleryRequest $request, int $project)
    {
        try {
            $message = $this->service->storeGallery($project, $request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $project, Gallery $pgallery)
    {
        try {
            $galleries = $this->service->getGalleries($project);
            return view('admin.project.gallery', compact('pgallery', 'galleries', 'project'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $project, ProjectGalleryRequest $request, Gallery $pgallery)
    {
        try {
            $message = $this->service->updateGallery($project, $request->validated(), $pgallery);
            return redirect()->route('pgallery.index', ['project' => $project])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $project, Gallery $pgallery)
    {
        try {
            if ($project != $pgallery->project_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->destroyGallery($pgallery);
            return redirect()->route('pgallery.index', ['project' => $project])->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(int $project, Gallery $pgallery)
    {
        try {
            if ($project != $pgallery->project_id) {
                throw new Exception('Data Not Found', 404);
            }
            $message = $this->service->updateStatus($pgallery);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
