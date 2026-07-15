<?php

namespace App\Http\Controllers\v1\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminRequest;
use App\Models\Admin;
use App\Services\Backend\Admin\AdminService;
use App\Services\Backend\Authorization\RoleService;
use Exception;

class AdminController extends Controller
{
    protected AdminService $service;
    protected RoleService $roleService;

    public function __construct(AdminService $service, RoleService $roleService)
    {
        $this->service = $service;
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $admins = $this->service->getAdmins();
            return view('admin.user.index', compact('admins'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $activeRoles = $this->roleService->getActiveRoles();
            return view('admin.user.create', compact('activeRoles'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        try {
            $message = $this->service->storeAdmin($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $user)
    {
        try {
            $activeRoles = $this->roleService->getActiveRoles();
            return view('admin.user.edit', compact('user', 'activeRoles'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $user)
    {
        try {
            $message = $this->service->updateAdmin($request->validated(), $user);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $user)
    {
        try {
            $message = $this->service->destroyAdmin($user);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Admin $user)
    {
        try {
            $message = $this->service->updateStatus($user);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
