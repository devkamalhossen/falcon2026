<?php

namespace App\Services\Backend\CMS;

use App\Models\AchievementContent;
use App\Models\Achievement;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;

class AchievementService
{
    const SWW = "Something went wrong";

    public function getAchievements(): Collection
    {
        try {
            return Achievement::with(['createdBy:id,name'])
                ->select('id', 'title', 'numbers', 'created_at', 'created_by', 'is_active')
                ->orderBy('id','desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeAchievement(array $data): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            Achievement::create($data);
            return "Achievement has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateAchievement(array $data, Achievement $achievement): string
    {
        try {

            $data['created_by'] = auth('admin')->user()->id;
            $achievement->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyAchievement(Achievement $achievement): string
    {
        try {
            $achievement->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Achievement $achievement): string
    {
        try {
            $achievement->update(['is_active' => !$achievement->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }



    // Achievment content
    public function getAchievmentContent(): ?AchievementContent
    {
        try {
            return AchievementContent::select('id', 'title', 'description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateAchievmentContent(array $data, AchievementContent $achievment_content): string
    {
        try {
            $data['created_by'] = auth('admin')->id();
            AchievementContent::updateOrCreate([
                'id' => $achievment_content->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'description' => $data['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return 'Updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
