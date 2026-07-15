<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SocialRequest;
use App\Models\SocialMedia;
use App\Services\Backend\CMS\SocialService;
use Exception;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{ 
    protected SocialService $service;

    public function __construct(SocialService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $socials = $this->service->getSocials();
          return view('admin.social.index', compact('socials'));
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
            return view('admin.social.create');
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialRequest $request)
    {
        try {
             $message = $this->service->storeSocial($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $social)
    {
         try {
            return view('admin.social.edit', compact('social'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialRequest $request, SocialMedia $social)
    {
         try {
             $message = $this->service->updateSocial($request->validated(), $social);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $social)
    {
         try {
            $message = $this->service->deleteSocial($social);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(SocialMedia $social)
    {
       try {
            $message = $this->service->updateStatus($social);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
