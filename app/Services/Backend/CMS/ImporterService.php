<?php

namespace App\Services\Backend\CMS;

use App\Models\Importer;
use Exception;
use Illuminate\Support\Collection;

class ImporterService
{
    const SWW = 'Something went wrong!';

    public function getImporters(): Collection
    {
        try {
            return Importer::with(['createdBy:id,name'])
                ->select('id', 'image', 'name', 'type', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeImporter(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], null, null, 'client_');
            }
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            Importer::create($data);
            return "Item has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateImporter(array $data, Importer $importer): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($importer->image);
                $image = uploadImage($data['image'], null,null, 'client_');
            } else {
                $image = $importer->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $importer->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyImporter(Importer $importer): string
    {
        try {
            if ($importer->image) {
                deleteImage($importer->image);
            }
             $importer->delete();
             return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Importer $importer): string
    {
        try {
            $importer->update(['is_active' => !$importer->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
