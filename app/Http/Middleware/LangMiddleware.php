<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();

        if (isset($user)) {
            App::setLocale($user->lang);
        }

        return $next($request);
    }
}
