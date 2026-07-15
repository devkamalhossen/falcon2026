<?php

namespace App\Services\Backend\Project;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Collection;

class ProjectGalleryService
{
   const SWW = 'Something went wrong!';

    public function getGalleries(int $project): Collection
    {
        try {
            return Gallery::with(['createdBy:id,name'])
                ->select('id', 'image',  'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('project_id', $project)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeGallery(int $project, array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1080, 720, 'gallery_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            $data['project_id'] = $project;
            Gallery::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateGallery(int $project, array $data, Gallery $gallery): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1080, 720, 'gallery_');
            } else {
                $image = $gallery->image;
            }
            $data['project_id'] = $project;
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $gallery->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyGallery(Gallery $gallery): string
    {
        try {
             if ($gallery->image) {
                deleteImage($gallery->image);
            } 
            $gallery->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Gallery $gallery): string
    {
        try {
            $gallery->update(['is_active' => !$gallery->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
