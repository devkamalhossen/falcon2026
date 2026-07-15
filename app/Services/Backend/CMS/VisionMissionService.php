<?php

namespace App\Services\Backend\CMS;

use App\Models\VisionMission;
use Exception;
use Illuminate\Support\Collection;

class VisionMissionService
{
    const SWW = "Something went wrong";

    public function getVisions(): Collection
    {
        try {
            return VisionMission::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'type', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function storeVision(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 650, 650, 'page');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            VisionMission::create($data);
            return "Added successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateVision(array $data, VisionMission $vision): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($vision->image);
                $image = uploadImage($data['image'], 650, 650, 'page_');
            } else {
                $image = $vision->image;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            $vision->update($data);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteVision(VisionMission $vision): string
    {
        try {
            if ($vision->image) {
                deleteImage($vision->image);
            }
            $vision->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(VisionMission $vision): string
    {
        try {
            $vision->update(['is_active' => !$vision->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
