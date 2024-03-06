<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckStudant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()->is_admin) {
            return $next($request);
        }

        // في حالة عدم تحقق الشرط، يمكن توجيه المستخدم إلى صفحة غير مسموح له
        return redirect('/admin/user');


    }
}
