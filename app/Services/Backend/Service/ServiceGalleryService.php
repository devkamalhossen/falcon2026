<?php

namespace App\Services\Backend\Service;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Collection;

class ServiceGalleryService
{
    const SWW = 'Something went wrong!';

    public function getGalleries(int $service): Collection
    {
        try {
            return Gallery::with(['createdBy:id,name'])
                ->select('id', 'image', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('service_id', $service)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeGallery(int $service, array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1080, 720, 'gallery_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            $data['service_id'] = $service;
            Gallery::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateGallery(int $service, array $data, Gallery $pgallery): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1080, 720, 'gallery_');
            } else {
                $image = $pgallery->image;
            }
            $data['service_id'] = $service;
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $pgallery->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyGallery(Gallery $pgallery): string
    {
        try {
             if ($pgallery->image) {
                deleteImage($pgallery->image);
            } 
            $pgallery->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Gallery $pgallery): string
    {
        try {
            $pgallery->update(['is_active' => !$pgallery->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
