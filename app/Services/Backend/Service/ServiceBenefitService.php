<?php

namespace App\Services\Backend\Service;

use App\Models\ServiceBenefit;
use Exception;
use Illuminate\Support\Collection;

class ServiceBenefitService
{
    const SWW = 'Something went wrong!';

    public function getBenefits(int $service): Collection
    {
        try {
            return ServiceBenefit::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'short_description', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('service_id', $service)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeBenefit(int $service, array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 290, 'service');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image ?? null;
            $data['service_id'] = $service;
            ServiceBenefit::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateBenefit(int $service, array $data, ServiceBenefit $benefit): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($benefit->image);
                $image = uploadImage($data['image'], 400, 290, 'service');
            } else {
                $image = $benefit->image;
            }
            $data['service_id'] = $service;
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $benefit->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyBenefit(ServiceBenefit $benefit): string
    {
        try {
            if ($benefit->image) {
                deleteImage($benefit->image);
            }
            $benefit->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceBenefit $benefit): string
    {
        try {
            $benefit->update(['is_active' => !$benefit->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
