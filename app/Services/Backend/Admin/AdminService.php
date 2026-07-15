<?php

namespace App\Services\Backend\Admin;

use App\Models\Admin;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    const SWW = 'Something went wrong!';

    public function getAdmins(): Collection
    {
        try {
            return Admin::with(['role:id,name', 'createdBy:id,name,image'])
                ->where('id', '!=', 1)
                ->select('id', 'role_id', 'created_by', 'name', 'number', 'image', 'email', 'deleteable', 'created_at', 'is_active')
                ->orderBy('id','desc')
                ->get();
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function storeAdmin(array $data): string
    {
        try {
            if (isset($data['image'])) {
                $image = uploadImage($data['image']);
            }
            $password = Hash::make($data['password']);
            $data['created_by'] = auth('admin')->user()->id;
            $data['image'] = $image ?? null;
            $data['password'] = $password;
            Admin::create($data);
            return "New user has been added.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function updateAdmin(array $data, Admin $user): string
    {
        try {
            if (isset($data['image'])) {
                deleteImage($user->image);
                $image = uploadImage($data['image']);
            } else {
                $image = $user->image;
            }
            $data['image'] = $image;
            $data['created_by'] = auth('admin')->user()->id;
            $password = isset($data['password']) ? Hash::make($data['password']) : $user->password;
            $data['password'] = $password;
            $user->update($data);
            return 'Updated Successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }

    public function destroyAdmin(Admin $user): bool
    {
        try {
            if ($user->image) {
                deleteImage($user->image);
            }
            return $user->delete();
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }

    public function updateStatus(Admin $user): string
    {
        try {
            $user->update(['is_active' => !$user->is_active]);
            return "Status updated successfully.";
        } catch (Exception $e) {
            throw new Exception(self::SWW, $e->getCode());
        }
    }
}
