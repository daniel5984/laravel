<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EnsureUserIsAllowedToAccess
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

        try {

            //Role do user atual
            $userRole = auth()->user()->role;

            //O nome da rota Atual
            $currentRouteName = Route::currentRouteName();

            if (in_array($currentRouteName, $this->userAccessRole()[$userRole])) {
                return $next($request);
            } else {
                abort(403, 'Esta role não tem acesso a esta página');
            }
        } catch (\Throable$th) {
            abort(403, 'Esta role não tem acesso a esta página');

        }
        //echo 'userrole: ' . $userRole . ' Rota Atual: ' . $currentRouteName;
        return $next($request);
    }

    private function userAccessRole()
    {
        return ['user' => ['dashboard'],
            'admin' => [
                'dashboard',
                'jornadas',
                'palestras',
                'workshops',
                'users',
                'permissions',

            ],
        ];
    }
}
