<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Periksa peran pengguna setelah login
        if (Auth::user()->role === 'superadmin') {
            return '/home'; // Arahkan ke halaman Home untuk Superadmin
        }

        return 'profile/edit'; // Arahkan ke halaman Profile untuk pengguna lain
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
