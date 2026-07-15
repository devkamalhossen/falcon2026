<?php

namespace App\Services\Backend\CMS;

use App\Models\GoogleReview;
use Exception;
use Illuminate\Support\Collection;

class GoogleReviewService
{
    const SWW = 'Something went wrong!';

    public function getReviews(): Collection
    {
        try {
            return GoogleReview::with(['createdBy:id,name'])
                ->select('id', 'image', 'name', 'review', 'rating', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeReview(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 300, 300, 'review');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image ??  null;
            GoogleReview::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateReview(array $data, GoogleReview $google_review): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($google_review->image);
                $image = uploadImage($data['image'], 300, 300, 'review');
            } else {
                $image = $google_review->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $google_review->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyReview(GoogleReview $google_review): string
    {
        try {
            if ($google_review->image) {
                deleteImage($google_review->image);
            }
            $google_review->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(GoogleReview $google_review): string
    {
        try {
            $google_review->update(['is_active' => !$google_review->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
