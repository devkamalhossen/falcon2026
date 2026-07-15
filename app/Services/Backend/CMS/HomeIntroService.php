<?php

namespace App\Services\Backend\CMS;

use App\Models\HomeIntro;
use Carbon\Carbon;
use Exception;

class HomeIntroService
{
    const SWW = 'Something went wrong!';

    public function getHomeIntro(): ?HomeIntro
    {
        try {
            return HomeIntro::select('id', 'title',  'description', 'video_id')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateContent(array $data, HomeIntro $home_intro): string
    {
        try {
            HomeIntro::updateOrCreate([
                'id' => $home_intro->id
            ], [

                'title' => $data['title'],
                'video_id' => $data['video_id'],
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
