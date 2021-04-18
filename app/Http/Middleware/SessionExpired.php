<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Auth;
use Session;

class SessionExpired {
    protected $session;
    protected $timeout = 1200;
    
    public function __construct(Store $session){
        $this->session = $session;
    }
    public function handle($request, Closure $next) {
        if (!Auth::onceBasic()) {
             if ($request->ajax() || $request->wantsJson()) {
                 return response('Unauthorized.', 401);
             } else {
                 return redirect()->guest('login');
             }
         }
     
         return $next($request);
     }
}

