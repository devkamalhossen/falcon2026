<?php

namespace App\Services\Backend\Authentication;

use App\Mail\AdminPasswordResetMail;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Permission;
use App\Models\Project;
use App\Models\Service;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;


class AuthService
{
    const ERROR_CREDENTIAL_DID_NOT_MATCH = "Credentials did not match!";
    const ERROR_SOMETHING_WAS_WRONG = "Something was wrong!";

    public function loginWithEmail(array $data): bool
    {
        if (auth('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'is_active' => true])) {
            return true;
        }
        throw new Exception(self::ERROR_CREDENTIAL_DID_NOT_MATCH, 404);
    }

    public function verifyEmail(array $data): string
    {
        $admin = Admin::where('email', $data['email'])->first();

        if (!$admin) {
            throw new Exception(self::ERROR_CREDENTIAL_DID_NOT_MATCH, 404);
        }

        $token = Password::broker('admins')->createToken($admin);
        // Send a custom notification email
        Mail::to($admin->email)->send(new AdminPasswordResetMail($admin, $token));
        return "Password reset link sended to your mail address. Please check your mail";

        throw new Exception(self::ERROR_SOMETHING_WAS_WRONG, 500);
    }
    public function resetPassword(array $data): string
    {
        $admin = Admin::where('email', $data['email'])->first();

        if (!$admin) {
            throw new Exception(self::ERROR_CREDENTIAL_DID_NOT_MATCH, 404);
        }

        $admin->password = Hash::make($data['password']);
        $admin->save();

        return "Password Reset Successfully.";
    }

    public function logout(): string
    {
        try {
            auth('admin')->logout();
            return "Successfully logged out.";
        } catch (Exception $e) {
            throw new Exception(self::ERROR_SOMETHING_WAS_WRONG, 500);
        }
    }

    public function check(): bool
    {
        try {
            if (auth('admin')->check()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            throw new Exception(self::ERROR_SOMETHING_WAS_WRONG, 500);
        }
    }

    function permissions(): Collection
    {
        try {
            return Permission::whereHas('roles', function ($q) {
                $q->where('permission_role.role_id', auth('admin')->user()->role_id);
            })->select('slug')->get();
        } catch (Exception $e) {
            throw new Exception(self::ERROR_SOMETHING_WAS_WRONG, 500);
        }
    }

    public function getDashboardData()
    {
        try {
            $services = Service::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as active,
            SUM(CASE WHEN is_active = 0 THEN 1 ELSE 0 END) as inactive
        ")->first();

            // Usage
            $totalServices = $services->total;
            $activeServices = $services->active;
            $inactiveServices = $services->inactive;
            $projects = Project::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as active,
            SUM(CASE WHEN is_active = 0 THEN 1 ELSE 0 END) as inactive
        ")->first();

            // Usage
            $totalProjects = $projects->total;
            $activeProjects = $projects->active;
            $inactiveProjects = $projects->inactive;

            $mostViewedBlogs = Blog::where('is_active', true)->orderBy('view_count', 'desc')->select('slug', 'image', 'title', 'view_count')->limit(5)->get();
            return [
                'totalServices' => $totalServices,
                'activeServices' => $activeServices,
                'inactiveServices' => $inactiveServices,
                'totalProjects' => $totalProjects,
                'activeProjects' => $activeProjects,
                'inactiveProjects' => $inactiveProjects,
                'mostViewedBlogs' => $mostViewedBlogs,
            ];
        } catch (Exception $e) {
            throw new Exception(self::ERROR_SOMETHING_WAS_WRONG, 500);
        }
    }
}
