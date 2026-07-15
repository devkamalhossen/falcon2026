<?php

namespace App\Services\Backend\CMS;

use App\Models\Location;
use Exception;
use Illuminate\Support\Collection;

class LocationService
{
    const SWW = 'Something went wrong!';

    public function getLocations(): Collection
    {
        try {
            return Location::with(['createdBy:id,name'])
                ->select('id', 'name', 'location', 'emails', 'phone_numbers', 'created_at', 'created_by', 'is_active')
                ->orderBy('id','desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeLocation(array $data): string
    {
        try {
            $data['created_by'] = auth('admin')->user()->id;
            Location::create($data);
            return "Location has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateLocation(array $data, Location $location): string
    {
        try {

            $data['created_by'] = auth('admin')->user()->id;
            $location->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyLocation(Location $location): string
    {
        try {
            $location->delete();
            return "Delete Successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Location $location): string
    {
        try {
            $location->update(['is_active' => !$location->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
