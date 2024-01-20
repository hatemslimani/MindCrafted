<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(auth()->user()->category == 2){
                return $next($request);
            }
            else
            {
                if (auth()->user()->category == 3) {
                    return redirect('home');
                }
                else
                {
                    if (auth()->user()->category == 1) {
                        return redirect('admin');
                    }
                }
            }
        }
        else
        {
            return redirect('/')->with('error',"You don't have teacher access.");
        }
    }
}
