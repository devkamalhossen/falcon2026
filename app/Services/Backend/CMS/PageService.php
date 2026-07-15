<?php

namespace App\Services\Backend\CMS;

use App\Models\Pages\Page;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PageService
{
    const SWW = "Something went wrong";

    public function getPages(): Collection
    {
        try {
            return Page::with(['createdBy:id,name'])
                ->select('id', 'image', 'name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function storePage(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1290, 730, 'page');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $data['image'] = $image;
            Page::create($data);
            return "Added successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePage(array $data, Page $page): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($page->image);
                $image = uploadImage($data['image'], 1290, 730, 'page_');
            } else {
                $image = $page->image;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $data['image'] = $image;
            $page->update($data);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deletePage(Page $page): string
    {
        try {
            if ($page->image) {
                deleteImage($page->image);
            }
            $page->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Page $page): string
    {
        try {
            $page->update(['is_active' => !$page->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
