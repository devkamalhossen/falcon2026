<?php

namespace App\Services\Backend\CMS;

use App\Models\CoreValue;
use App\Models\HomeIntro;
use Carbon\Carbon;
use Exception;

class CoreValueService
{
    const SWW = 'Something went wrong!';

    public function getCoreValueContent(): ?CoreValue
    {
        try {
            return CoreValue::select('id', 'title',  'description', 'image')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateContent(array $data, CoreValue $core_value): string
    {
        try {
             if (isset($data['image'])) {
                $image = uploadImage($data['image'], null, null, 'review');
            }
            $data['image'] = $image ??  null;
            CoreValue::updateOrCreate([
                'id' => $core_value->id
            ], [

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
