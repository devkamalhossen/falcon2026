<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LocationRequest;
use App\Models\Location;
use App\Services\Backend\CMS\LocationService;
use Exception;

class LocationController extends Controller
{
    protected LocationService $service;

    public function __construct(LocationService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $locations = $this->service->getLocations();
            $location = null;
            return view('admin.location.index', compact('locations', 'location'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        try {
            $message = $this->service->storeLocation($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        try {
            $locations = $this->service->getLocations();
            return view('admin.location.index', compact('location', 'locations'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location)
    {
        try {
            $message = $this->service->updateLocation($request->validated(), $location);
            return redirect()->route('location.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        try {
            $message = $this->service->destroyLocation($location);
            return redirect()->route('location.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(Location $location)
    {
        try {
            $message = $this->service->updateStatus($location);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
