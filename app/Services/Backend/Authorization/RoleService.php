<?php

namespace App\Services\Backend\Authorization;

use App\Models\PermissionGroup;
use App\Models\Role;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RoleService
{
    const SWW = "Something was wrong!";

    public function getRoles(): Collection
    {
        try {
            return Role::with(['createdBy:id,name,created_at'])
                ->withCount('permissions')
                ->orderBy('id', 'DESC')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeRole(array $data, int $userId): string
    {
        DB::beginTransaction();
        try {
            $data['created_by'] =  $userId;
            $role = Role::create($data);
            $role->permissions()->sync($data['permissions']);
            DB::commit();
            return 'New role has been added successfully.';
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(self::SWW, 500);
        }
    }

    public function getRole($role)
    {
        return PermissionGroup::with(['permissions' => function ($q) use ($role) {
            $q->whereHas('roles', function ($q) use ($role) {
                $q->where('role_id', $role->id);
            })->select('id', 'permission_group_id', 'name');
        }])
            ->select('id', 'name')->get();
    }
    public function getEditRole($role)
    {
        $role->permission_ids = $role->permissions()->pluck('permissions.id')->toArray();
        return $role;
    }

    public function updateRole(array $data, $role, int $userId): string
    {
        DB::beginTransaction();
        try {
            $data['created_by'] = $userId;
            $role->update($data);
            if ($role->deletable) {
                $role->permissions()->sync($data['permissions']);
            } else {
                $role->permissions()->syncWithoutDetaching($data['permissions']);
            }

            DB::commit();
            return 'Updated successfully.';
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(self::SWW, 500);
        }
    }

    public function deleteRole($role): string
    {
        if (!$role->deletable) {
            throw new Exception("Could not delete!", 403);
        }
        try {
            $role->delete();
            return "Successfully deleted.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function getPermissions(): Collection
    {
        try {
            return PermissionGroup::with('permissions:id,permission_group_id,name')->select('id', 'name')->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    function getActiveRoles(): Collection
    {
        try {
            $role = Role::where('is_active', true)->where('id', '!=', 1)->where('deletable', true)->select('id', 'name')->get();
            return $role;
        } catch (Exception $e) {
            throw new Exception("Something was wrong!", 500);
        }
    }

     public function updateStatus(Role $role): string
    {
        try {
            $role->update(['is_active' => !$role->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
