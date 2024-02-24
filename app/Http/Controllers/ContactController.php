<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $contacts = Contact::all();
        return view('contact.index',['data'=>$contacts]);
    }

    public function create(): View
    {
        return view('contact.create');
    }

    public function store(ContactStoreRequest $request , Contact $contact): RedirectResponse
    {
        Contact::create($request->validated());
        return redirect()
            ->route('contacts.show')
            ->with('success', 'Contact created successfully');
    }

    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $contact->update($request->validated());
        return redirect()->route('contacts.show')->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()
            ->route('contacts.show')
            ->with('status', 'Contact deleted successfully');
    }
}
