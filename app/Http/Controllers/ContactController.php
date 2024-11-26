<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.index');
    }

    public function sendEmail(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Send email
        try {
            Mail::to('selkiechocolate@gmail.com')->send(new ContactFormMail($validated));
            return redirect()->route('contact.form')->with('status', 'Your message has been sent!');
        } catch (\Exception $e) {
            return redirect()->route('contact.form')->with('status', 'There was an error sending your message. Please try again later.');
        }
    }
}
