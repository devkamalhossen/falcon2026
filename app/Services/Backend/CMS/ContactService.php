<?php

namespace App\Services\Backend\CMS;

use App\Models\Pages\PageContact;
use Carbon\Carbon;
use Exception;

class ContactService
{
    const ERROR_MESSAGE = "Something went wrong";

     // Contact page
    public function getContactPageContent(): ?PageContact
    {
        try {
            return PageContact::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords')->first();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
    public function updatePageContent(array $data, PageContact $contact): string
    {
        try {
            if (isset($data['image'])) {
                if ($contact->image) {
                    deleteImage($contact->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $contact->image;
            }
            $data['created_by'] = auth('admin')->id();
            PageContact::updateOrCreate([
                'id' => $contact->id
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
            throw new Exception(self::ERROR_MESSAGE, 500);
        }
    }
}
