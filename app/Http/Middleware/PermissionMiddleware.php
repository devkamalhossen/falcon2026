<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        $method = $request->method();
        switch ($method) {
            case 'GET':
                $permission .= '.access';
                break;
            case 'POST':
                $permission .= '.create';
                break;
            case 'PUT':
            case 'PATCH':
                $permission .= '.edit';
                break;
            case 'DELETE':
                $permission .= '.destroy';
                break;
            default:
                return abort(404);
        }

        if (!auth('admin')->user()->check($permission)) {
            return abort(403);
        }

        return $next($request);
    }
}
