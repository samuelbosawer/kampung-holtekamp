<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class RoleCustom
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Jika user TIDAK punya role yang diizinkan
        if (! $user->hasAnyRole($roles)) {

            // Jika user login tapi role lain
            if ($user->hasAnyRole(['admindinas', 'petugas', 'masyarakat'])) {

                return redirect()->to(
                    URL::previous() !== url()->current()
                        ? URL::previous()
                        : route('home')
                );
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
