<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        echo '1 middleware';
        echo 'vai trò: '.$role;
        echo '<br> Thuc hien khi dang xu ly HTTP response';
        return $next($request);
    }
    public function terminate($request, $response){
        echo '<br> 3. Terminable Middleware';
        echo '<br> Thuc hien sau khi HTTP Response gui den trinh duyet';
    }
}
