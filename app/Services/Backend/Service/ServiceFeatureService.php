<?php

namespace App\Services\Backend\Service;

use App\Models\ServiceFeature;
use Exception;
use Illuminate\Support\Collection;

class ServiceFeatureService
{
    const SWW = 'Something went wrong!';

    public function getFeatures(int $service): Collection
    {
        try {
            return ServiceFeature::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'short_description', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('service_id', $service)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeFeature(int $service, array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 290, 'service');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['service_id'] = $service;
            $data['image'] = $image ?? null;
            ServiceFeature::create($data);
            return "Item has been added.";
       } catch (Exception $e) {
           throw new Exception(self::SWW, 500);
       }
    }

    public function updateFeature(int $service, array $data, ServiceFeature $feature): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($feature->image);
                $image = uploadImage($data['image'], 400, 290, 'service');
            } else {
                $image = $feature->image;
            }
            $data['image'] = $image;
             $data['service_id'] = $service;
            $data['created_by'] = auth('admin')->user()->id;
            $feature->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyFeature(ServiceFeature $feature): string
    {
        try {
            if ($feature->image) {
                deleteImage($feature->image);
            }
            $feature->delete();
             return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceFeature $feature): string
    {
        try {
            $feature->update(['is_active' => !$feature->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
