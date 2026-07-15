<?php

namespace App\Services\Backend\CMS;

use App\Models\HomeCategoryIntro;
use Carbon\Carbon;
use Exception;

class HomeCategoryIntroService
{
    const SWW = 'Something went wrong!';

    public function getHomeCategoryIntro(): ?HomeCategoryIntro
    {
        try {
            return HomeCategoryIntro::select('id', 'title',  'description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateContent(array $data, HomeCategoryIntro $home_category_intro): string
    {
        try {
            HomeCategoryIntro::updateOrCreate([
                'id' => $home_category_intro->id
            ], [

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
