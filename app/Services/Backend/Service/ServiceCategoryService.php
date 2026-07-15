<?php

namespace App\Services\Backend\Service;

use App\Models\ServiceCategory;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ServiceCategoryService
{
    const SWW = 'Something went wrong!';

    public function getCategories(): Collection
    {
        try {
            return ServiceCategory::with(['createdBy:id,name'])
                ->select('id', 'name', 'slug', 'image', 'description', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeCategory(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1290, 730, 'service_category');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['name']);
            $data['image'] = $image ?? null;
            ServiceCategory::create($data);
            return "Category has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCategory(array $data, ServiceCategory $category): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($category->image);
                $image = uploadImage($data['image'], 1290, 730, 'service_category');
            } else {
                $image = $category->image;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['name']);
            $data['image'] = $image;
            $category->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteCategory(ServiceCategory $category): string
    {
        try {
            if ($category->image) {
                deleteImage($category->image);
            }
            $category->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceCategory $category): string
    {
        try {

            $category->update(['is_active' => !$category->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
    public function getActiveCategory(): Collection
    {
        try {
            return ServiceCategory::where('is_active', true)
                ->select('id', 'name')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
