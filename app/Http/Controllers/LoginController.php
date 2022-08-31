<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $config = [
            'title' => 'System Login'
        ];
        return view('login.index', $config);
    }

    public function auth(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|string|min:4',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('notif', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong><i class="icon fa fa-ban"></i> Error Login!</strong> <br>Email or Password incorrect, please try again!
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
        </div>');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
