<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$tipe_user)
    {
        if (in_array($request->user()->tipe_user, $tipe_user)) {
            return $next($request);
        }
        return redirect('/Login')->with('gagal','Limited Access');
    }
}
