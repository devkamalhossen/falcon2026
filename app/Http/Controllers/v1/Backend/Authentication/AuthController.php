<?php

namespace App\Http\Controllers\v1\Backend\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\VerifyEmailRequest;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Services\Backend\Authentication\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function dashboard()
    {
        $data = $this->service->getDashboardData();
        return view('admin.index', compact('data'));
    }
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function forgotPasswordForm()
    {
        return view('admin.auth.passwords.email');
    }

    public function resetPasswordForm()
    {
        return view('admin.auth.passwords.reset');
    }

    public function verifyEmail(VerifyEmailRequest $request)
    {
        try {
            $message = $this->service->verifyEmail($request->validated());
            return back()->with('success_message', $message);
        } catch (Exception $e) {
            return back()->with('error_message', $e->getMessage());
        }
    }
    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $message = $this->service->resetPassword($request->validated());
            return redirect()->route('admin.login')->with('message', $message);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    function login(AuthRequest $request)
    {
        try {
            $this->service->loginWithEmail($request->validated());
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }



    public function logout()
    {
        try {
            $message = $this->service->logout();
            return redirect()->route('admin.login')->with('message', $message);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function check(): JsonResponse
    {
        try {
            $status = $this->service->check();
            return response()->json([
                'status' => $status
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function permissions(): JsonResponse
    {
        try {
            $permissions = $this->service->permissions();
            return response()->json([
                'permissions' => $permissions
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
