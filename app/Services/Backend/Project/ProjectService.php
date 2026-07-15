<?php

namespace App\Services\Backend\Project;

use App\Models\Project;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ProjectService
{
    const SWW = "Something went wrong";

    public function getProjects(): Collection
    {
        try {
            return Project::with(['createdBy:id,name', 'service:id,title'])
                ->select('id', 'image', 'name', 'service_id', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function storeProject(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1290, 730, 'project_');
            }
            if (isset($data['video'])) {
                $video = uploadFile($data['video'], 'video');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $data['image'] = $image;
            $data['video'] = $video ?? null;
            Project::create($data);
            return "Added successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateProject(array $data, Project $project): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($project->image);
                $image = uploadImage($data['image'], 1290, 730, 'project');
            } else {
                $image = $project->image;
            }
            if (isset($data['video'])) {
                if ($project->video) {
                    deleteImage($project->video);
                }
                $video = uploadFile($data['video'], 'video');
            } else {
                $video = $project->video;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $data['image'] = $image;
            $data['video'] = $video;
            $project->update($data);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteProject(Project $project): string
    {
        try {
            if ($project->image) {
                deleteImage($project->image);
            }
            if ($project->video) {
                deleteImage($project->video);
            }
            $project->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Project $project): string
    {
        try {
            $project->update(['is_active' => !$project->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
