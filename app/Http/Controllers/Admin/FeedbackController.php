<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index()
    {
        return view(
            "pages.adminpage.feedback.index",
            [
                'feedbacks' => Feedback::all()
            ]
        );
    }

    public function storeFeedback(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|string|max:70',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        Feedback::insert($validatedData);
        notify()->success('Berhasil Mengirim Feedback');
        return redirect()->route('main.contact.us');
    }
}
