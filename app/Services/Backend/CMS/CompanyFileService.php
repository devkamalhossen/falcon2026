<?php

namespace App\Services\Backend\CMS;

use App\Models\CompanyFile;
use Exception;
use Illuminate\Support\Collection;

class CompanyFileService
{
    const SWW = 'Something went wrong!';

    public function getFiles(): Collection
    {
        try {
            return CompanyFile::with(['createdBy:id,name'])
                ->select('id', 'image', 'title', 'type', 'file', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeFile(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 500, 'company_file_img_');
            }
            if (isset($data['file'])) {
                $file = uploadFile($data['file'], 'company_file_');
            }

            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            $data['file'] = $file;
            CompanyFile::create($data);
            return "File has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateFile(array $data, CompanyFile $company_file): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($company_file->image);
                $image = uploadImage($data['image'], 400, 500, 'company_file_imgg');
            } else {
                $image = $company_file->image;
            }
            if (isset($data['file'])) {
                deleteImage($company_file->file);
                $file = uploadFile($data['file'], 'company_file_');
            } else {
                $file = $company_file->file;
            }
            $data['image'] = $image;
            $data['file'] = $file;
            $data['created_by'] = auth('admin')->user()->id;
            $company_file->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteFile(CompanyFile $company_file): string
    {
        try {
            if ($company_file->image) {
                deleteImage($company_file->image);
            }
            if ($company_file->file) {
                deleteImage($company_file->file);
            }
            $company_file->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(CompanyFile $company_file): string
    {
        try {
            $company_file->update(['is_active' => !$company_file->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
