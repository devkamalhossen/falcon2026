<?php

namespace App\Http\Controllers\v1\Backend\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RoleManageRequest;
use App\Models\Role;
use App\Services\Backend\Authorization\RoleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleManageController extends Controller
{
    protected RoleService $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $roles = $this->service->getRoles();
            return view('admin.role.index', compact('roles'));
        } catch (Exception $e) {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $permissionGroups = $this->service->getPermissions();
            return view('admin.role.create', compact('permissionGroups'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleManageRequest $request)
    {
        try {
            $message = $this->service->storeRole($request->validated(), auth('admin')->id());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        try {
            $permissionGroups = $this->service->getRole($role);
            return view('admin.role.show', compact('permissionGroups'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        try {
            $rolePermissionGroups = $this->service->getEditRole($role);
            $permissionGroups = $this->service->getPermissions();
            return view('admin.role.edit', compact('permissionGroups', 'rolePermissionGroups', 'role'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleManageRequest $request, Role $role)
    {
        try {
            $message = $this->service->updateRole($request->validated(), $role, auth('admin')->user()->id);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $message =  $this->service->deleteRole($role);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Role $role)
    {
       try {
            $message = $this->service->updateStatus($role);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
