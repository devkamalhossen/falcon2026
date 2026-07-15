<?php

namespace App\Services\Backend\CMS;

use App\Models\SocialMedia;
use Exception;
use Illuminate\Support\Collection;

class SocialService
{
    const SWW = 'Something went wrong!';

    public function getSocials(): Collection
    {
        try {
            return SocialMedia::with(['createdBy:id,name'])
                ->select('id', 'name', 'link', 'created_at', 'created_by', 'is_active')
                ->orderBy('id','desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeSocial(array $data): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            $data['name'] = strtolower($data['name']);
            SocialMedia::create($data);
            return "Social Media has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateSocial(array $data, SocialMedia $social): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            $data['name'] = strtolower($data['name']);
            $social->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteSocial(SocialMedia $social): string
    {
        try {

            $social->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(SocialMedia $social): string
    {
        try {
            $social->update(['is_active' => !$social->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
