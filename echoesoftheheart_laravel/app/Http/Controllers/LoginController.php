<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;

class LoginController extends Controller
{
    // Procesa el login
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('inicio');
        }

        return back()->withErrors(['error' => 'Credenciales inválidas']);
    }


    // Procesa el registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fecha_de_registro' => Carbon::now(),
        ]);

        // Progreso::create([

        // ]);

        Auth::login($user);

        return redirect('/inicio');
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'fecha_de_registro' => Carbon::now(),
        ]);



        Auth::login($user);

        return redirect('/inicio');
        // $user->token
    }
}
