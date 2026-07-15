<?php

namespace App\Services\Backend\CMS;

use App\Models\CertificateBadge;
use Exception;
use Illuminate\Support\Collection;

class CertificateBadgeService
{
    const SWW = 'Something went wrong!';

    public function getCertificateBadges(): Collection
    {
        try {
            return CertificateBadge::select('id', 'image',  'created_at', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeCertificateBadge(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 100, 100, 'certificate');
            }
            $data['image'] = $image;
            CertificateBadge::create($data);
            return "New Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCertificateBadge(array $data, CertificateBadge $certificate_badge): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($certificate_badge->image);
                $image = uploadImage($data['image'], 100, 100, 'certificate');
            } else {
                $image = $certificate_badge->image;
            }
            $data['image'] = $image;
            $certificate_badge->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyCertificateBadge(CertificateBadge $certificate_badge): string
    {
        try {
            if ($certificate_badge->image) {
                deleteImage($certificate_badge->image);
            }
            $certificate_badge->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(CertificateBadge $certificate_badge): string
    {
        try {
            $certificate_badge->update(['is_active' => !$certificate_badge->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
