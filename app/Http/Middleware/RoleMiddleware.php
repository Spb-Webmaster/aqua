<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {

        $user = auth()->user();
        if ($user) {

            foreach ($roles as $role) {
                $role = trim($role);
                if ($user->role->name == $role) {

                    return $next($request);

                }
            }
        }
        flash()->alert('You are trying to enter the wrong area of responsibility'); // Вы пытаетесь проникнуть не в ту зону ответственности

        return redirect('/login');

    }
}
