<?php

namespace App\Http\Controllers\v1\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GeneralSettingFBPixelRequest;
use App\Http\Requests\Backend\GeneralSettingGoogleTagRequest;
use App\Http\Requests\Backend\GeneralSettingInformationRequest;
use App\Http\Requests\Backend\GeneralSettingMailSetupRequest;
use App\Http\Requests\Backend\GeneralSettingMetaSEORequest;
use App\Services\Backend\Setting\GeneralSettingService;
use Exception;

class GeneralSettingController extends Controller
{
    public function __construct(protected GeneralSettingService $service)
    {
        $this->service = $service;
    }

    public function systemInfo()
    {
        return view('admin.setting.system-info');
    }

    public function generalInformation()
    {
        return view('admin.setting.general');
    }
    public function generalInformationUpdate(GeneralSettingInformationRequest $request)
    {
       try {
            $message = $this->service->updateGeneralSetting($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
           return abort($e->getCode());
       }
    }
    public function generalMetaSEO()
    {
        return view('admin.setting.meta-seo');
    }
    public function updateMetaSEO(GeneralSettingMetaSEORequest $request)
    {
        try {
            $message = $this->service->updateGeneralMetaSEO($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function generalFBPixel()
    {
        return view('admin.setting.fb-pixel');
    }
    public function updateFBPixel(GeneralSettingFBPixelRequest $request)
    {
        try {
            $message = $this->service->updateGeneralFBPixel($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function generalGoogleTag()
    {
        return view('admin.setting.google-tags');
    }
    public function updateGoogleTag(GeneralSettingGoogleTagRequest $request)
    {
        try {
            $message = $this->service->updateGeneralGoogleTag($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
    public function generalMail()
    {
        return view('admin.setting.mail-setup');
    }
    public function updateMail(GeneralSettingMailSetupRequest $request)
    {
        try {
            $message = $this->service->updateGeneralMail($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
