<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\HomeCategoryIntroRequest;
use App\Models\HomeCategoryIntro;
use App\Services\Backend\CMS\HomeCategoryIntroService;
use Exception;
use Illuminate\Http\Request;

class HomeCategoryIntroController extends Controller
{
     public function __construct(protected HomeCategoryIntroService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $pageData = $this->service->getHomeCategoryIntro();
            return view('admin.home.home-category-intro', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(HomeCategoryIntroRequest $request, HomeCategoryIntro $home_category_intro)
    {
        try {
            $message = $this->service->updateContent($request->validated(), $home_category_intro);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
