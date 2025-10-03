<?php

namespace App\Http\Middleware;

use App\Models\Session;
use App\Models\UserActivity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RecordSessionActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = $request->session()->getId();

        if (Auth::check()) {
            $userActivity = UserActivity::where('user_id', auth()->user()->id)
                ->whereNull('logged_out_at')
                ->latest('logged_in_at')
                ->first();

            if (!isset($userActivity->session_id)) {
                $userActivity->update([
                    'session_id' => $sessionId
                ]);
            }

            $session = Session::where('id', $userActivity->session_id)?->first();

            if (true) {
                $userActivity->update([
                    'session_expired_at' => $session->last_activity
                ]);
            }
        }

        return $next($request);
    }

//    public function terminate(Request $request, $response)
//    {
//
//
//
//
//        // Проверим, существует ли строка в таблице sessions (работает при SESSION_DRIVER=database)
////        $sessionsTable = config('session.table', 'sessions');
////        $sessionExists = DB::table($sessionsTable)->where('id', $sessionId)->exists();
//
////        $sessionExists = Session::find($sessionId);
////
////        if ($sessionExists && Auth::check()) {
////            $userId = Auth::id();
////
////            UserActivity::updateOrCreate(
////                [
////                    'user_id'    => $userId,
////                    'session_id' => $sessionId,
////                ],
////                [
////                    'ip_address'   => $request->ip(),
////                    'user_agent'   => $request->userAgent(),
////                    // logged_in_at: если нужно первый раз — оставлять текущее, иначе не перезаписывать
////                    'logged_in_at' => now(),
////                ]
////            );
////        }
//    }

}
