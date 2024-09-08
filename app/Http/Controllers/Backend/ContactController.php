<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Contact us page all function here..(#udayan285#)
                
    function storeContact(Request $request)
    {

        $this->validations($request);

        Contact::create($request->all());

        return redirect()->back()->with('status', 'Contact-us information added successfully.');
    }

    function removeContact($id)
    {
        $contact = Contact::where('id',$id)->first();
        $contact->delete();
        return redirect()->back()->with('status',"Selected Contact info. deleted successfully.");
    }
            
    function editContact($id)
    {
        $contactEdit = Contact::where('id',$id)->first();
        return view('backend.contact.editContact',compact('contactEdit'));
    }
        
    function updateContact(Request $request, $id)
    {
        $this->validations($request);
    
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
    
        return redirect()->route('dashboard.contactPage')
            ->with('status', "Contact-us information updated successfully.");
    }

    function activeContact($id)
    {
        $contact = Contact::findOrFail($id);
    
        // Deactivate other contacts
        Contact::where('id', '!=', $id)->update(['status' => 0]);
    
        // Activate the current contact
        $contact->update(['status' => 1]);
    
        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    function validations($request)
    {
        $request->validate([
            'contact_location' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
        ]);
    }
}
