<?php

namespace App\Services\Backend\Home;

use App\Models\Home\HomeBanner;
use Exception;
use Illuminate\Support\Collection;

class HomeBannerService
{
    const SWW = 'Something went wrong!';

    public function getBanners(): Collection
    {
        try {
            return HomeBanner::with(['createdBy:id,name'])
                ->select('id', 'image', 'alt_name', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeBanner(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 1980, 920, 'banner_slider_');
            }

            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            HomeBanner::create($data);
            return "Banner has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateBanner(array $data, HomeBanner $banner): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($banner->image);
                $image = uploadImage($data['image'], 1980, 920, 'banner_slider_');
            } else {
                $image = $banner->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $banner->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteBanner(HomeBanner $banner): string
    {
        try {
            if ($banner->image) {
                deleteImage($banner->image);
            }
            $banner->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(HomeBanner $banner): string
    {
        try {
            $banner->update(['is_active' => !$banner->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
