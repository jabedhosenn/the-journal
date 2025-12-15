<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = $request->email;
        $existing_email = Newsletter::where('email', $email)->first();
        if ($existing_email) {
            return redirect()->back()->with('info', 'You are already subscribed!');
        }

        Newsletter::create([
            'email' => $email,
        ]);

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }
}
