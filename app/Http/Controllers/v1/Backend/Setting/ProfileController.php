<?php

namespace App\Http\Controllers\v1\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserProfileUpdateRequest;
use App\Http\Requests\Backend\UserUpdatePasswordRequest;
use App\Models\Admin;
use App\Services\Backend\Setting\ProfileService;
use Exception;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected ProfileService $service;
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try{
            $user = auth('admin')->user();
            return view('admin.setting.profile', compact('user'));
        }catch(Exception $e){
            return abort($e->getCode());
        }
    }

    public function update(UserProfileUpdateRequest $request, Admin $admin)
    {
        try{
            $message = $this->service->updateProfile($request->validated(), $admin);
            return back()->with('success', $message);
        }catch(Exception $e){
            return abort($e->getCode());
        }
    }
    public function updatePassword(UserUpdatePasswordRequest $request, Admin $admin)
    {
        try{
            $message = $this->service->passwordUpdate($request->validated(), $admin);
            return back()->with('success', $message);
        }catch(Exception $e){
            return abort($e->getCode());
        }
    }
}
