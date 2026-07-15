<?php

namespace App\Services\Backend\CMS;

use App\Models\TeamType;
use Exception;
use Illuminate\Support\Collection;

class TeamTypeService
{
     const SWW = 'Something went wrong!';

    public function getTeamTypes(): Collection
    {
        try {
            return TeamType::with(['createdBy:id,name'])
                ->select('id', 'name', 'order_by', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }


    public function storeTeamType(array $data): string
    {
        try {
          
            $data['created_by'] = auth('admin')->user()->id;
            TeamType::create($data);
            return "New type has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateTeamType(array $data, TeamType $teamType): string
    {
        try {
          
            $data['created_by'] = auth('admin')->user()->id;
            $teamType->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyTeamType(TeamType $teamType): string
    {
        try {
           
            $teamType->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(TeamType $teamType): string
    {
        try {
            $teamType->update(['is_active' => !$teamType->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function getActiveTypes(): Collection
    {
        return TeamType::where('is_active', true)->select('id', 'name')->get();
    }
}
