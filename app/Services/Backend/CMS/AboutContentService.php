<?php

namespace App\Services\Backend\CMS;

use App\Models\AboutContent;
use App\Models\AcheivementContent;
use Carbon\Carbon;
use Exception;

class AboutContentService
{
    const SWW = "Something went wrong.";

     // about content
    public function getAboutContent(): ?AboutContent
    {
        try {
            return AboutContent::select('id', 'image', 'title', 'description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateAboutContent(array $data, AboutContent $about_content): string
    {
        try {
            if (isset($data['image'])) {
                if ($about_content->image) {
                    deleteImage($about_content->image);
                }
                $data['image'] = uploadImage($data['image'], 600, 900, 'thumbnail_');
            } else {
                $data['image'] = $about_content->image;
            }
            $data['created_by'] = auth('admin')->id();
            AboutContent::updateOrCreate([
                'id' => $about_content->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'image' => $data['image'],
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
