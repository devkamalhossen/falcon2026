<?php

namespace App\Services\Backend\CMS;

use App\Models\GalleryCategory;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GalleryCategoryService
{
     const SWW = 'Something went wrong!';

    public function getCategories(): Collection
    {
        try {
            return GalleryCategory::with(['createdBy:id,name'])
                ->select('id', 'name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeCategory(array $data): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            GalleryCategory::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCategory(array $data, GalleryCategory $gallery_category): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            $gallery_category->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyGallery(GalleryCategory $gallery_category): string
    {
        try {
           
            $gallery_category->delete();
            return 'Delete Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(GalleryCategory $gallery_category): string
    {
        try {
            $gallery_category->update(['is_active' => !$gallery_category->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function getActiveGalleryCategories(): LengthAwarePaginator
    {
        return GalleryCategory::with(['galleries' => function($q){
            $q->select('id','image', 'type', 'video_id', 'category_id');
            $q->where('is_active', true);
            $q->orderBy('id', 'desc');
        }])->where('is_active', true)->select('id', 'name')->paginate(10);
    }
}
