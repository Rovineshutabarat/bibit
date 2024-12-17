<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Auth;
use Illuminate\Http\RedirectResponse;
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

    public function ContactUs(): View
    {
        return view("pages.main.contact-us");
    }

    public function AboutUs(): View
    {
        return view("pages.main.about-us");
    }
}
