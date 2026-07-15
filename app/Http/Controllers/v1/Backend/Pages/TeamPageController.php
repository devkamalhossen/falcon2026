<?php

namespace App\Http\Controllers\v1\Backend\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TeamPageRequest;
use App\Models\Pages\PageTeam;
use App\Services\Backend\CMS\TeamService;
use Exception;
use Illuminate\Http\Request;

class TeamPageController extends Controller
{
    public function __construct(protected TeamService $service)
    {
        $this->service = $service;        
    }

    public function index()
    {
        try {
            $pageData = $this->service->getTeamPageContent();
            return view('admin.pages.team', compact('pageData'));
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }

    public function update(TeamPageRequest $request, PageTeam $team)
    {
        try {
            $message = $this->service->updatePageContent($request->validated(), $team);
            return back()->with('success', $message);
        } catch (Exception $e) {
            return abort($e->getCode());
        }
    }
}
