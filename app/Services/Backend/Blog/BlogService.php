<?php

namespace App\Services\Backend\Blog;

use App\Models\Blog;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BlogService
{
    const SWW = 'Something went wrong!';

    public function getBlogs(): Collection
    {
        try {
            return Blog::with(['createdBy:id,name', 'category:id,name'])
                ->select('id', 'title', 'view_count', 'blog_category_id', 'image', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeBlog(array $data): string
    {
        try {
            if (!empty($data['image'])) {
                $data['image'] = uploadImage($data['image'], 1290, 730, 'blog_', 'images/blog');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            Blog::create($data);
            return "Blog has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateBlog(array $data, Blog $blog): string
    {
        try {
            if (!empty($data['image'])) {
                if ($blog->image) {
                    deleteImage($blog->image);
                }
                $data['image'] = uploadImage($data['image'], 1290, 730, 'blog_', 'images/blog');
            } else {
                $data['image'] = $blog->image;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $blog->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteBlog(Blog $blog): string
    {
        try {
            if ($blog->image) {
                deleteImage($blog->image);
            }
            $blog->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Blog $blog): string
    {
        try {
            $blog->update(['is_active' => !$blog->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
