<?php

namespace App\Http\Controllers\Public;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('public.feedback.create');
    }

    public function store(Request $request)
    {
        // validation input
        $request->validate([
            'name'      => ['required', 'string'],
            'email'     => ['required', 'email'],
            'message'   => ['required', 'string'],
        ]);

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $flashData = [
            'message'               => 'Berhasil dikirim',
            'alert'                 => 'primary',
            'icon'                  => 'bi bi-check2-square',
        ];

        return redirect()->route('feedback.create')->with($flashData);
    }
}
