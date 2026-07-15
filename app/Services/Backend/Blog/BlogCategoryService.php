<?php

namespace App\Services\Backend\Blog;

use App\Models\BlogCategory;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class BlogCategoryService
{
    const SWW = 'Something went wrong!';

    public function getCategories(): Collection
    {
        try {
            return BlogCategory::with(['createdBy:id,name'])
                ->select('id', 'name', 'slug', 'created_at', 'created_by', 'is_active')
                ->orderBy('id','desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeCategory(array $data): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['name']);
            BlogCategory::create($data);
            return "Category has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCategory(array $data, BlogCategory $category): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['name']);
            $category->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteCategory(BlogCategory $category): string
    {
        try {
            $category->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(BlogCategory $category): string
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
            return BlogCategory::where('is_active', true)
                ->select('id', 'name')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
