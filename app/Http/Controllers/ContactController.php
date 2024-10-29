<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display the contact form
    public function index()
    {
        return view('contact.index');
    }
    
    // Process the contact form submission (optional)
    public function sendContact(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Here, you could send an email, save the contact message, etc.
        
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
