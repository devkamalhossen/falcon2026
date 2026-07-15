<?php

namespace App\Services\Backend\CMS;

use App\Models\Certifications;
use App\Models\Client;
use App\Models\Pages\CertificatePage;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;

class CertificationsService
{
    const SWW = 'Something went wrong!';

    public function getCertificates(): Collection
    {
        try {
            return Certifications::with(['createdBy:id,name'])
                ->select('id', 'image', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeCertificate(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 500, 'certificate_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            Certifications::create($data);
            return "New Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateCertificate(array $data, Certifications $certification): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($certification->image);
                $image = uploadImage($data['image'], 400, 500, 'certificate_');
            } else {
                $image = $certification->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $certification->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyCertificate(Certifications $certification): string
    {
        try {
            if ($certification->image) {
                deleteImage($certification->image);
            }
            $certification->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Certifications $certification): string
    {
        try {
            $certification->update(['is_active' => !$certification->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

     // Certificate page
    public function getCertificatePageContent(): ?CertificatePage
    {
        try {
            return CertificatePage::select('id', 'image', 'title', 'meta_title', 'meta_description', 'meta_keywords', 'section_title', 'section_description')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, CertificatePage $certificate): string
    {
        try {
            if (isset($data['image'])) {
                if ($certificate->image) {
                    deleteImage($certificate->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $certificate->image;
            }
            $data['created_by'] = auth('admin')->id();
            CertificatePage::updateOrCreate([
                'id' => $certificate->id
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
