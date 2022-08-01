<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Designation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        if (Auth::user()->designation_id == 2 || Auth::user()->designation_id == 3) {
        
        // elseif(Auth::user()->designation_id == 4){
        //     return redirect('manager');

        // }elseif(Auth::user()->designation_id == 5){
        //     return redirect('ic');

        // }elseif(Auth::user()->designation_id == 6){
        //     return redirect('store');

        // }else{
        //     return redirect('/');

        // }
        return $next($request);
        }
        return redirect('home');

    }
}
