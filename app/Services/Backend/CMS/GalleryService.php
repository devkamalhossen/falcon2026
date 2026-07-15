<?php

namespace App\Services\Backend\CMS;

use App\Models\Gallery;
use Exception;
use Illuminate\Support\Collection;

class GalleryService
{
    const SWW = 'Something went wrong!';

    public function getGalleries(): Collection
    {
        try {
            return Gallery::with(['createdBy:id,name'])
                ->select('id', 'image', 'video_id', 'type', 'alt_name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->whereNull('service_id')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeGallery(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], null, null, 'gallery');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image ?? null;
            Gallery::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateGallery(array $data, Gallery $gallery): string
    {
        try {
            if ($data['type'] == 2) {
                if ($gallery->image) {
                    deleteImage($gallery->image);
                }
            }
            if (isset($data['image'])) {
                deleteImage($gallery->image);
                $image = uploadImage($data['image'], null, null, 'gallery');
            } else {
                $image = $gallery->image;
            }
            $data['image'] = $image ?? null;
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
            return 'Delete Successfully.';
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
