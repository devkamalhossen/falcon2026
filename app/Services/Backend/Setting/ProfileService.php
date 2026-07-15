<?php

namespace App\Services\Backend\Setting;

use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    const SWW = "Something went wrong.";

    public function updateProfile(array $data, Admin $admin): string
    {
        
        try {
            if(!empty($data['image'])){
                if($admin->image){
                    deleteImage($admin->image);
                }
                $data['image'] = uploadImage($data['image'], 300, 300, 'profile_');
            }else{
                $data['image'] = $admin->image;
            }
            $admin->update($data);
            return 'Profile updated';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
    public function passwordUpdate(array $data, Admin $admin): string
    {
        try {
            if (!Hash::check($data['current_password'], $admin->password)) {
                return back()->with('error', 'The current password does not match our records.');
            }
            $admin->password = Hash::make($data['new_password']);
            $admin->save();
            return 'Password updated successfully.';
        } catch (Exception $e) {
            throw new Exception(self::SWW, 500);
        }
    }
}
