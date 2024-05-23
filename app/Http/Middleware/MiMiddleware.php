<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    

  
    
        public function handle($request, Closure $next)
        {
            // Lógica del middleware aquí
            echo "Middleware funcionando";
            
            return $next($request);
        }
    }
    