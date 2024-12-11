<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        
        if(Session::has('locale'))
        {
            App::setLocale(Session::get('locale'));
        }
        return $next($request);
    }

       
    }

