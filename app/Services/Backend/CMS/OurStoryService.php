<?php

namespace App\Services\Backend\CMS;

use App\Models\Pages\PageOurStory;
use Carbon\Carbon;
use Exception;

class OurStoryService
{
    const SWW = "Something went wrong.";

     // our story page
    public function getPageContent(): ?PageOurStory
    {
        try {
            return PageOurStory::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageOurStory $our_story): string
    {
        //try {
            if (isset($data['image'])) {
                if ($our_story->image) {
                    deleteImage($our_story->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $our_story->image;
            }
            $data['created_by'] = auth('admin')->id();
            PageOurStory::updateOrCreate([
                'id' => $our_story->id
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
      //  } catch (Exception $e) {
          //  throw new Exception(self::SWW, 500);
        //}
    }
}
