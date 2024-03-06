<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Subject;
use App\Models\User;


class CheckChatAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subjectId = $request->route('subject_id');
        $subject  = Subject::find($subjectId);
        $user = Auth::user();
        $users = User::find($request->user);
        // $message = Message::find($subjectId);
        // dd($user->subjects->contains($subjectId));
        // تحقق من أن المستخدم مسجل الدخول ومخزن في الموضوع
        if ( $user->subjects->contains($subjectId) && $user->is_actev ||$user->is_admin ) {
            return $next($request);
        }
        // dd($subjectId);
        // إذا لم يكن المستخدم مسجل الدخول أو غير مخزن في الموضوع
        // dd($subjectId);
        return redirect()->route('index_subject')->with('error', 'غير مصرح بالوصول.');

        // return $next($request);


    }
}
