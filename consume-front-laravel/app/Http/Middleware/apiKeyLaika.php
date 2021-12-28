<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class apiKeyLaika{

    public function handle(Request $request, Closure $next){
    return redirect('no-autorizado');
    //   return $next($request);
    }
}
