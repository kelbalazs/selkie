<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Display the contact form
    public function index()
    {
        return view('contact.index');
    }
    
    // Process the contact form submission and send an email
    public function sendContact(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Prepare the details for the email
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Send the email
        Mail::to('recipient@example.com')->send(new ContactMail($details));

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
