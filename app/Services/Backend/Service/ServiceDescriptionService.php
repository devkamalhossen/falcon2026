<?php

namespace App\Services\Backend\Service;

use App\Models\ServiceDescription;
use Exception;
use Illuminate\Support\Collection;

class ServiceDescriptionService
{
     const SWW = 'Something went wrong!';

    public function getDescription(int $service): Collection
    {
        try {
            return ServiceDescription::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('service_id', $service)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeDescription(int $service, array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], null, null, 'service');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['service_id'] = $service;
            $data['image'] = $image ?? null;
            ServiceDescription::create($data);
            return "Item has been added.";
       } catch (Exception $e) {
           throw new Exception(self::SWW, 500);
       }
    }

    public function updateDescription(int $service, array $data, ServiceDescription $description): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($description->image);
                $image = uploadImage($data['image'], null,null, 'service');
            } else {
                $image = $description->image;
            }
            $data['image'] = $image;
             $data['service_id'] = $service;
            $data['created_by'] = auth('admin')->user()->id;
            $description->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyDescription(ServiceDescription $description): string
    {
        try {
            if ($description->image) {
                deleteImage($description->image);
            }
            $description->delete();
             return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceDescription $description): string
    {
        try {
            $description->update(['is_active' => !$description->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
