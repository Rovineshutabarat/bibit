<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function homepage(): View
    {
        return view("pages.main.homepage");
    }

    public function profile(): View
    {
        return view("pages.main.profile", [
            'user' => Auth::user()
        ]);
    }
}
