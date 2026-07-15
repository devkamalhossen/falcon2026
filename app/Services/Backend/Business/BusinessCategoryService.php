<?php

namespace App\Services\Backend\Business;

use App\Models\BusinessCategory;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BusinessCategoryService
{
    const SWW = 'Something went wrong!';

    public function getCategories(): Collection
    {
        try {
            return BusinessCategory::with(['createdBy:id,name'])
                ->select('id', 'name', 'thumbnail', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeCategory(array $data): string
    {
        try {
            if (isset($data['thumbnail'])) {
                $image = uploadImage($data['thumbnail'], 400, 500, 'service_category');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['thumbnail'] = $image ?? null;
            BusinessCategory::create($data);
            return "Category has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCategory(array $data, BusinessCategory $business_category): string
    {
        try {
            if (isset($data['thumbnail'])) {
                deleteImage($business_category->thumbnail);
                $image = uploadImage($data['thumbnail'], 400, 500, 'service_category');
            } else {
                $image = $business_category->thumbnail;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['thumbnail'] = $image;
            $business_category->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteCategory(BusinessCategory $business_category): string
    {
        try {
            if ($business_category->thumbnail) {
                deleteImage($business_category->thumbnail);
            }
            $business_category->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(BusinessCategory $business_category): string
    {
        try {

            $business_category->update(['is_active' => !$business_category->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
    public function getActiveCategory(): Collection
    {
        try {
            return BusinessCategory::where('is_active', true)
                ->select('id', 'name')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
