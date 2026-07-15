<?php

namespace App\Services\Backend\Service;

use App\Models\ServiceFAQ;
use Exception;
use Illuminate\Support\Collection;

class ServiceFAQService
{
    const SWW = 'Something went wrong!';

    public function getFAQs(int $service): Collection
    {
        try {
            return ServiceFAQ::with(['createdBy:id,name'])
                ->select('id','title', 'description', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->where('service_id', $service)
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeFAQ(int $service, array $data): string
    {
        try {
           
            $data['created_by'] = auth('admin')->user()->id;
            $data['service_id'] = $service;
            ServiceFAQ::create($data);
            return "Item has been added.";
       } catch (Exception $e) {
           throw new Exception(self::SWW, 500);
       }
    }

    public function updateFAQ(int $service, array $data, ServiceFAQ $faq): string
    {
        try {
           
             $data['service_id'] = $service;
            $data['created_by'] = auth('admin')->user()->id;
            $faq->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyFAQ(ServiceFAQ $faq): string
    {
        try {
          
            $faq->delete();
             return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(ServiceFAQ $faq): string
    {
        try {
            $faq->update(['is_active' => !$faq->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
