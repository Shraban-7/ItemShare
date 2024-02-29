<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('backend.pages.contact_list', ['contacts' => $contacts]);
    }

    public function create()
    {

        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
            'from_add' => 'required|string',
            'to_add' => 'required|string',
        ]);

        // Create a new Contact instance
        $contact = new Contact();
        $contact->user_id = auth()->user()->id; // Assuming you have authentication and want to associate the contact with the logged-in user
        $contact->message = $request->message;
        $contact->from_add = $request->from_add;
        $contact->to_add = $request->to_add;
        // Assign other fields as needed

        $contact->save(); // Save the contact to the database
        Toastr::success('message sent successfully',);
        return redirect()->back()->with('success', 'Contact created successfully!');
    }
}
