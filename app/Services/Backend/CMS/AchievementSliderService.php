<?php

namespace App\Services\Backend\CMS;

use App\Models\AchievementSlider;
use Exception;
use Illuminate\Support\Collection;

class AchievementSliderService
{
    const SWW = 'Something went wrong!';

    public function getSliders(): Collection
    {
        try {
            return AchievementSlider::with(['createdBy:id,name'])
                ->select('id', 'image', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeSlider(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 450, 'achievement_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            AchievementSlider::create($data);
            return "New Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateSlider(array $data, AchievementSlider $slider): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($slider->image);
                $image = uploadImage($data['image'], 400, 450, 'certificate_');
            } else {
                $image = $slider->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $slider->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroySlider(AchievementSlider $slider): string
    {
        try {
            if ($slider->image) {
                deleteImage($slider->image);
            }
            $slider->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(AchievementSlider $slider): string
    {
        try {
            $slider->update(['is_active' => !$slider->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
