<?php

namespace App\Services\Backend\Service;

use App\Models\Pages\PageService;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ServiceManageService
{
    const SWW = "Something went wrong";

    public function getServices(): Collection
    {
        try {
            return Service::with(['createdBy:id,name', 'category:id,name'])
                ->select('id', 'image', 'title', 'service_category_id', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function storeService(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1290, 730, 'service_');
            }
            if (isset($data['video'])) {
                $video = uploadFile($data['video'], 'video');
            }
            $data['video'] = $video ?? null;
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $data['image'] = $image;
            Service::create($data);
            return "Added successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateService(array $data, Service $service): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($service->image);
                $image = uploadImage($data['image'], 1290, 730, 'service_');
            } else {
                $image = $service->image;
            }
            if (isset($data['video'])) {
                if ($service->video) {
                    deleteImage($service->video);
                }
                $video = uploadFile($data['video'], 'video');
            } else {
                $video = $service->video;
            }
            $data['video'] = $video;
            $data['created_by'] = auth('admin')->user()->id;
            $data['slug'] = Str::slug($data['slug']);
            $data['image'] = $image;
            $service->update($data);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteService(Service $service): string
    {
        try {
            if ($service->image) {
                deleteImage($service->image);
            }
             if ($service->video) {
                deleteImage($service->video);
            }
            $service->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Service $service): string
    {
        try {
            $service->update(['is_active' => !$service->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
    public function getActiveServices(): Collection
    {
        try {
            return Service::where('is_active', true)->select('id', 'title')->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    // Service page
    public function getPageContent(): ?PageService
    {
        try {
            return PageService::select('id', 'meta_title', 'meta_description', 'meta_keywords', 'section_title', 'section_description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageService $service): string
    {
        try {

            $data['created_by'] = auth('admin')->id();
            PageService::updateOrCreate([
                'id' => $service->id
            ], [
                'created_by' => $data['created_by'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'section_title' => $data['section_title'],
                'section_description' => $data['section_description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return 'Updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
