<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\WhyChooseUsRequest;
use App\Models\WhyChooseUs;
use App\Services\Backend\CMS\WhyChooseUsService;
use Exception;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{

    public function __construct(protected WhyChooseUsService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $whyChooses = $this->service->getWhyChoose();
            $why_choose_u = null;
            return view('admin.why-choose-us.index', compact('whyChooses','why_choose_u'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsRequest $request)
    {
         try {
            $message = $this->service->storeWhyChoose($request->validated());
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChooseUs $why_choose_u)
    {
        try {
             $whyChooses = $this->service->getWhyChoose();
            return view('admin.why-choose-us.index', compact('why_choose_u', 'whyChooses'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhyChooseUsRequest $request, WhyChooseUs $why_choose_u)
    {
         try {
            $message = $this->service->updateWhyChoose($request->validated(), $why_choose_u);
            return redirect()->route('why-choose-us.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChooseUs $why_choose_u)
    {
        try {
            $message = $this->service->destroyWhyChoose($why_choose_u);
             return redirect()->route('why-choose-us.index')->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

     /**
     * Update the specified resource from storage.
     */
    public function statusUpdate(WhyChooseUs $why_choose_u)
    {
        try {
            $message = $this->service->updateStatus($why_choose_u);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
