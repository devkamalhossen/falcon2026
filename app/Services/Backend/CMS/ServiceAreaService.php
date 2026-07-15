<?php

namespace App\Services\Backend\CMS;

use App\Models\Pages\PageServiceArea;
use App\Models\ServiceArea;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ServiceAreaService
{
    const SWW = "Something went wrong";

    public function getServiceAreas(): Collection
    {
        try {
            return ServiceArea::with(['createdBy:id,name'])
                ->select('id', 'image', 'area_name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function storeServiceArea(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1290, 730, 'service_area_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['area_slug'] = Str::slug($data['area_slug']);
            $data['image'] = $image;
            ServiceArea::create($data);
            return "Added successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateServiceArea(array $data, ServiceArea $service_area): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($service_area->image);
                $image = uploadImage($data['image'], 1290, 730, 'service_area_');
            } else {
                $image = $service_area->image;
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['area_slug'] = Str::slug($data['area_slug']);
            $data['image'] = $image;
            $service_area->update($data);
            return "Updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteServiceArea(ServiceArea $service_area): string
    {
        try {
            if ($service_area->image) {
                deleteImage($service_area->image);
            }
            $service_area->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceArea $service_area): string
    {
        try {
            $service_area->update(['is_active' => !$service_area->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    // Service Area Page
    public function getServiceAreaPageContent(): ?PageServiceArea
    {
        try {
            return PageServiceArea::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords', 'section_title', 'section_description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageServiceArea $service_area): string
    {
        try {
            if (isset($data['image'])) {
                if ($service_area->image) {
                    deleteImage($service_area->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $service_area->image;
            }
            $data['created_by'] = auth('admin')->id();
            PageServiceArea::updateOrCreate([
                'id' => $service_area->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'image' => $data['image'],
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
