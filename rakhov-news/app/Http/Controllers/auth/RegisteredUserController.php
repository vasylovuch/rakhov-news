<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class RegisteredUserController extends Controller
{
    public function create()
    {
        // Показати форму реєстрації
        return view('auth.register'); 
    }

    public function store(Request $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);

    // Скидаємо старий intended URL
    session()->forget('url.intended');

    // Перенаправлення на сторінку створення новини
    return redirect()->route('news.create');
}

}
