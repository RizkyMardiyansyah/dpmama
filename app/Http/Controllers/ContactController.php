<?php

namespace App\Http\Controllers;

use App\Mail\clientContactMail;
use App\Mail\ContactMail;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            // $validated = $request->validate([
            //     'name' => 'required|string|max:255',
            //     'email' => 'required|email|max:255',
            //     'phone' => 'nullable|string|max:20',
            //     'company' => 'nullable|string|max:255',
            //     'message' => 'required|string',
            // ]);
            $validated = $request->all();
            Mail::to($validated['email'])->queue(new clientContactMail($validated));
            Mail::to('hi@mardsoft.com')->queue(new ContactMail($validated));

            Message::create($validated);
            return redirect()->back()->with('success', 'Your message has been sent successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send your message. Please try again.');
        }
    }

}
