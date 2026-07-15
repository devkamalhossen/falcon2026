<?php

namespace App\Http\Controllers\v1\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\HomeIntroRequest;
use App\Models\HomeIntro;
use App\Services\Backend\CMS\HomeIntroService;
use Exception;
use Illuminate\Http\Request;

class HomeIntroController extends Controller
{
    public function __construct(protected HomeIntroService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $pageData = $this->service->getHomeIntro();
            return view('admin.home.home-intro', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(HomeIntroRequest $request, HomeIntro $home_intro)
    {
        try {
            $message = $this->service->updateContent($request->validated(), $home_intro);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
