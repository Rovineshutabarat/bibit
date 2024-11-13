<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginView(): View
    {
        return view('auth.login');
    }

    public function registerView(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|string|max:70|unique:user',
            'password' => 'string|max:255',
        ]);

        if (!$validatedData) {
            notify()->error('Input Tidak Valid');
            return redirect()->back();
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        DB::table('user')->insert($validatedData);
        notify()->success('Berhasil Registrasi ⚡️');
        return redirect()->route('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|string|max:70',
            'password' => 'required|string|max:255',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            notify()->error('Email atau password salah');
            return redirect()->back()
                ->withInput($request->only('email'));
        }

        notify()->success('Berhasil Login ⚡️');
        return redirect()->route('adminpage.product.index');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            notify()->success('Berhasil Logout ⚡️');
            return redirect()->route('auth.login');
        }
    }
}
