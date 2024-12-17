<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where("google_id", $googleUser->id)->first();

            if (!$user) {
                $user_id = User::insertGetId([
                    'google_id' => $googleUser->getId(),
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(10))
                ]);
                $user = User::where('id', $user_id)->first();
                Cart::firstOrCreate([
                    "user_id" => $user_id
                ]);
            }

            Auth::loginUsingId($user->id);

            if ($user->role === 0) {
                notify()->success('Berhasil Login ⚡️');
                return redirect()->route('adminpage.dashboard.index');
            } elseif ($user->role === 1) {
                notify()->success('Berhasil Login ⚡️');
                return redirect()->route('store.index');
            }
        } catch (Exception $e) {
            notify()->error('Gagal Login: ' . $e->getMessage());
            return redirect()->route('auth.login');
        }
    }
}
