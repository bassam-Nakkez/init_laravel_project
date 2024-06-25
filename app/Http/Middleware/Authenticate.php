<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return response('Unauthorized.', 401);
        }
    }


    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
              return $this->auth->authenticate();
     }

    foreach ($guards as $guard) {
        if ($this->auth->guard($guard)->check()) {
            return $this->auth->shouldUse($guard);
        }
    }

    throw new AuthenticationException('Unauthenticated.', $guards);
}


    
}
