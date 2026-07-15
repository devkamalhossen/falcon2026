<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AchievementContentRequest;
use App\Models\AchievementContent;
use App\Services\Backend\CMS\AchievementService;
use Exception;

class AchievementContentController extends Controller
{
    public function __construct(protected AchievementService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getAchievmentContent();
            return view('admin.about.achievement-content', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(AchievementContentRequest $request, AchievementContent $achievment_content)
    {
        try {
            $message = $this->service->updateAchievmentContent($request->validated(), $achievment_content);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
