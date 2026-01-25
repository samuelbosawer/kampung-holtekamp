<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
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
            if ($user->hasAnyRole(['admin', 'rw', 'rt','warga'])) {

                Alert::error('Gagal', 'Anda tidak memiliki akses');
                return redirect()->back();
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
