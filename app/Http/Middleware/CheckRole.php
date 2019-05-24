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
        $arr_tu = explode(",",$request->user()->tipe_user);
        $a = array_intersect($arr_tu,$tipe_user);
        $str = implode($a);
        //return dd($a);
        
        if (in_array($str, $tipe_user)) {
            return $next($request);
        }
        
        return redirect('/Login')->with('gagal','Limited Access');
        
    }
}
