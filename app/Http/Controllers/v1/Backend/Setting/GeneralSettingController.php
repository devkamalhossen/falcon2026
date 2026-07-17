<?php

namespace App\Http\Controllers\v1\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GeneralSettingFBPixelRequest;
use App\Http\Requests\Backend\GeneralSettingGoogleTagRequest;
use App\Http\Requests\Backend\GeneralSettingInformationRequest;
use App\Http\Requests\Backend\GeneralSettingMailSetupRequest;
use App\Http\Requests\Backend\GeneralSettingMetaSEORequest;
use App\Services\Backend\Setting\GeneralSettingService;
use Illuminate\Http\Request;
use App\Models\CaseStudy;
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


    // start of case study from here 
    public function viewCaseStudy()
    {
        $pageData = CaseStudy::first(); 
        $caseStudies = CaseStudy::all();
        return view('admin.casestudy.case-study', compact('pageData', 'caseStudies'));
    }

    public function StoreCaseStudy(Request $request)
    {
       $request->validate([
            'header'   => 'required|string|max:255',
            'title'    => 'required|string|max:255',
            'area'     => 'nullable|string',
            'industry' => 'nullable|string',
            'solution' => 'nullable|string',
            'timeline' => 'nullable|string',
            'outcome'  => 'nullable|string',
        ]);

        CaseStudy::create($request->all());

        return redirect()->back()->with('success', 'Case Study created successfully!');
    }

    public function editCaseStudy($id)
    {
        $updateData = CaseStudy::findOrFail($id);
        return view('admin.casestudy.edit_case_study', compact('updateData'));
    }

    public function updateCaseStudy(Request $request, $id)
    {
        $request->validate([
            'header'   => 'required|string|max:255',
            'title'    => 'required|string|max:255',
            'area'     => 'nullable|string',
            'industry' => 'nullable|string',
            'solution' => 'nullable|string',
            'timeline' => 'nullable|string',
            'outcome'  => 'nullable|string',
        ]);

        $caseStudy = CaseStudy::findOrFail($id);

        $caseStudy->update([
            'header'   => $request->header,
            'title'    => $request->title,
            'area'     => $request->area,
            'industry' => $request->industry,
            'solution' => $request->solution,
            'timeline' => $request->timeline,
            'outcome'  => $request->outcome,
        ]);

        return redirect()->route('view_case_study')->with('success', 'Case Study updated successfully!');
    }

    public function deleteCaseStudy($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);

        $caseStudy->delete();

        return redirect()->back()->with('success', 'Case Study deleted successfully!');
    }



}
