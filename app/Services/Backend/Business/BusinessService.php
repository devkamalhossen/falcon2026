<?php

namespace App\Services\Backend\Business;

use App\Models\Business;
use App\Models\Pages\PageOurBusiness;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;

class BusinessService
{
     const SWW = 'Something went wrong!';

    public function getBusinesses(): Collection
    {
        try {
            return Business::with(['createdBy:id,name', 'category:id,name'])
                ->select('id', 'category_id', 'name', 'link', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeBusiness(array $data): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            Business::create($data);
            return "Product has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateBusiness(array $data, Business $business): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            $business->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyBusiness(Business $business): string
    {
        try {
            
            $business->delete();
            return "Deleted succesfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Business $business): string
    {
        try {
            $business->update(['is_active' => !$business->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    // business page
     public function getBusinessPageContent(): ?PageOurBusiness
    {
        try {
            return PageOurBusiness::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageOurBusiness $our_business): string
    {
        try {
            if (isset($data['image'])) {
                if ($our_business->image) {
                    deleteImage($our_business->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $our_business->image;
            }
            $data['created_by'] = auth('admin')->id();
            PageOurBusiness::updateOrCreate([
                'id' => $our_business->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'image' => $data['image'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return 'Updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
