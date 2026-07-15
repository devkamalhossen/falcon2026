<?php

namespace App\Services\Backend\CMS;

use App\Models\Pages\PageTeam;
use App\Models\Team;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;

class TeamService
{
    const SWW = 'Something went wrong!';

    public function getTeams(): Collection
    {
        try {
            return Team::with(['createdBy:id,name', 'teamType:id,name'])
                ->select('id', 'image', 'name', 'team_type_id', 'designation', 'bio', 'is_director', 'created_at', 'created_by', 'is_active')
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeTeam(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image'], 400, 500, 'team_');
            }

            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image;
            Team::create($data);
            return "Team Member has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateTeam(array $data, Team $team): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($team->image);
                $image = uploadImage($data['image'], 400, 500, 'team_');
            } else {
                $image = $team->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $team->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteTeam(Team $team): string
    {
        try {
            if ($team->image) {
                deleteImage($team->image);
            }
            $team->delete();
            return "Deleted successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Team $team): string
    {
        try {
            $team->update(['is_active' => !$team->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

     // Team page
    public function getTeamPageContent(): ?PageTeam
    {
        try {
            return PageTeam::select('id', 'image', 'title', 'team_image', 'meta_title', 'meta_description', 'meta_keywords')->first();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function updatePageContent(array $data, PageTeam $team): string
    {
        try {
            if (isset($data['image'])) {
                if ($team->image) {
                    deleteImage($team->image);
                }
                $data['image'] = uploadImage($data['image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['image'] = $team->image;
            }
            if (isset($data['team_image'])) {
                if ($team->team_image) {
                    deleteImage($team->team_image);
                }
                $data['team_image'] = uploadImage($data['team_image'], 1920, 1080, 'thumbnail_');
            } else {
                $data['team_image'] = $team->team_image;
            }
            $data['created_by'] = auth('admin')->id();
            PageTeam::updateOrCreate([
                'id' => $team->id
            ], [
                'created_by' => $data['created_by'],
                'title' => $data['title'],
                'image' => $data['image'],
                'team_image' => $data['team_image'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return 'Updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
