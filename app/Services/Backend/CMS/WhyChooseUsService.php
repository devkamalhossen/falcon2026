<?php

namespace App\Services\Backend\CMS;

use App\Models\Pages\PageWhyChoose;
use App\Models\WhyChooseUs;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;

class WhyChooseUsService
{
     const SWW = 'Something went wrong!';

    public function getWhyChoose(): Collection
    {
        try {
            return WhyChooseUs::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'short_description', 'created_at', 'created_by', 'is_active')
                ->orderBy('id','desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeWhyChoose(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 290, 'image_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            WhyChooseUs::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateWhyChoose(array $data, WhyChooseUs $why_choose_u): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($why_choose_u->image);
                $image = uploadImage($data['image'], 400, 290, 'image_');
            } else {
                $image = $why_choose_u->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $why_choose_u->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyWhyChoose(WhyChooseUs $why_choose_u): string
    {
        try {
            if ($why_choose_u->image) {
                deleteImage($why_choose_u->image);
            }
            $why_choose_u->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(WhyChooseUs $why_choose_u): string
    {
        try {
            $why_choose_u->update(['is_active' => !$why_choose_u->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    // Why CHoose Page page
    public function getWhyChoosePageContent(): ?PageWhyChoose
    {
        try {
            return PageWhyChoose::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords', 'section_title', 'section_description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageWhyChoose $why_choose): string
    {
        try {
            if (isset($data['image'])) {
                if ($why_choose->image) {
                    deleteImage($why_choose->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $why_choose->image;
            }
            $data['created_by'] = auth('admin')->id();
            PageWhyChoose::updateOrCreate([
                'id' => $why_choose->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'image' => $data['image'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'section_title' => $data['section_title'],
                'section_description' => $data['section_description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return 'Updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
