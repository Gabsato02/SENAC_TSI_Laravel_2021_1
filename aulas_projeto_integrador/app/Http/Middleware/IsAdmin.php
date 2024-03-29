<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->user()->isAdmin)
            return $next($request);

        session()->flash('error', 'Você não tem permidssão para acessar essa página!');
        return redirect()->back();
    }
}
