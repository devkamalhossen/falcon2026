<?php

namespace App\Services\Backend\CMS;

use App\Models\CoreValue;
use App\Models\FounderMessage;
use Carbon\Carbon;
use Exception;

class FounderMessageService
{
    const SWW = 'Something went wrong!';

    public function getContent(): ?FounderMessage
    {
        try {
            return FounderMessage::select('id', 'title', 'name', 'designation', 'company',  'description', 'image')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updateContent(array $data, FounderMessage $founder_message): string
    {
        try {
             if (isset($data['image'])) {
                $image = uploadImage($data['image'], null, null, 'review');
            }
            $data['image'] = $image ??  null;
            FounderMessage::updateOrCreate([
                'id' => $founder_message->id
            ], [

                'title' => $data['title'],
                'name' => $data['name'],
                'designation' => $data['designation'],
                'company' => $data['company'],
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
