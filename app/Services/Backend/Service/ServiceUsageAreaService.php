<?php

namespace App\Services\Backend\Service;

use App\Models\ServiceUsageArea;
use Exception;
use Illuminate\Support\Collection;

class ServiceUsageAreaService
{
    const SWW = 'Something went wrong!';

    public function getUsageAreas(int $service): Collection
    {
        try {
            return ServiceUsageArea::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'short_description', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('service_id', $service)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeUsageArea(int $service, array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 290, 'service');
            }
            $data['image'] = $image ?? null;
            $data['created_by'] = auth('admin')->user()->id;
            $data['service_id'] = $service;
            ServiceUsageArea::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateUsageArea(int $service, array $data, ServiceUsageArea $usage_area): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($usage_area->image);
                $image = uploadImage($data['image'], 400, 290, 'service');
            } else {
                $image = $usage_area->image;
            }
            $data['image'] = $image;
            $data['service_id'] = $service;
            $data['created_by'] = auth('admin')->user()->id;
            $usage_area->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyUsageArea(ServiceUsageArea $usage_area): string
    {
        try {
            if ($usage_area->image) {
                deleteImage($usage_area->image);
            }
            $usage_area->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceUsageArea $usage_area): string
    {
        try {
            $usage_area->update(['is_active' => !$usage_area->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
