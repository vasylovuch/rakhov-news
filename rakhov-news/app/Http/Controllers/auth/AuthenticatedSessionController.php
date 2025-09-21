<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        // Показати форму входу
        return view('auth.login'); 
    }

    public function store(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        // Скидаємо старий intended URL, щоб fallback не йшов на '/'
        $request->session()->forget('url.intended');

        // Перенаправлення на сторінку створення новини
        return redirect()->route('news.create');
    }

    return back()->withErrors([
        'email' => 'Невірні дані для входу.',
    ]);
}



    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}