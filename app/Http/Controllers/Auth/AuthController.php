<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginView(): View
    {
        return view('pages.auth.login');
    }

    public function registerView(): View
    {
        return view('pages.auth.register');
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
        $user = User::create($validatedData);
        Cart::firstOrCreate([
            "user_id" => $user->id
        ]);
        notify()->success('Berhasil Registrasi ⚡️');
        return redirect()->route('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();


        if ($user->role === 0) {
            return redirect()->route('adminpage.dashboard.index');
        } elseif ($user->role === 1) {
            return redirect()->route('store.index');
        }
        return redirect()->route('home');
    } else {
        notify()->error('Email atau password salah');
        return redirect()->back()->withInput($request->only('email'));
    }
}


    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            notify()->success('Berhasil Logout ⚡️');
            return redirect()->route('auth.login');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'string|max:50',
            'email' => 'email|string|max:70',
            'password' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|regex:/^\+?[0-9]{10,15}$/',
        ]);

        if (!$validatedData) {
            notify()->error('Input Tidak Valid');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/user'), $imageName);
            $validatedData['image'] = 'images/user/' . $imageName;
        }
        User::where('id', $id)->update($validatedData);
        notify()->success('Berhasil Update Profil ⚡️');
        return redirect()->route('main.profile');
    }

    public function deleteProfilePicture(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->image) {
            $user->image = "";
            $user->save();
            notify()->success('Foto profil berhasil dihapus ⚡️');
            return redirect()->route('main.profile');
        } else {
            notify()->error('Tidak ada foto profil yang dapat dihapus');
            return redirect()->back();
        }
    }
}
