<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('settings', 'contacts')); // adjust view name as needed
    }

      public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.contact.create', compact('settings')); // adjust view name as needed
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();

         return redirect()->back()->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {

         $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.contact.show', compact('contact','settings')); // adjust view name as needed
    }

    public function edit(Contact $contact)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.contact.edit', compact('contact','settings')); // adjust view name as needed
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }
}
