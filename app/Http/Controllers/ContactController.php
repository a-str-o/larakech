<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $contacts = Contact::with('organisation')
            ->when($search, function($query) use ($search) {
                $query->where('nom', 'like', "%$search%")
                      ->orWhere('prenom', 'like', "%$search%")
                      ->orWhereHas('organisation', function($query) use ($search) {
                          $query->where('nom', 'like', "%$search%");
                      });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return view('contacts.index', compact('contacts', 'search'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'e_mail' => 'required|email|unique:contact,e_mail',
            'nom' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'prenom' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'organisation_nom' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'adresse' => 'required|string',
            'code_postal' => 'required|string|max:255|regex:/^[0-9]+$/',
            'ville' => 'required|string|max:255',
            'statut' => 'required|string|max:20',
        ]);

        // Format the input data
        $formattedData = [
            'prenom' => ucwords($request->input('prenom')),
            'nom' => ucwords($request->input('nom')),
            'e_mail' => strtolower($request->input('e_mail')),
            'organisation_nom' => ucwords($request->input('organisation_nom')),
            'adresse' => $request->input('adresse'),
            'code_postal' => $request->input('code_postal'),
            'ville' => ucwords($request->input('ville')),
            'statut' => $request->input('statut'),
        ];

        // Check for duplicates
        if (Contact::where('prenom', $formattedData['prenom'])->where('nom', $formattedData['nom'])->exists()) {
            return redirect()->back()->withErrors(['contact_exists' => 'A contact with the same name already exists.'])->withInput();
        }

        if (Organisation::where('nom', $formattedData['organisation_nom'])->exists()) {
            return redirect()->back()->withErrors(['organisation_exists' => 'An organisation with the same name already exists.'])->withInput();
        }

        // Create organisation
        $organisationData = [
            'nom' => $formattedData['organisation_nom'],
            'adresse' => $formattedData['adresse'],
            'code_postal' => $formattedData['code_postal'],
            'ville' => $formattedData['ville'],
            'statut' => $formattedData['statut'],
            'cle' => md5(uniqid(rand(), true)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $organisation = Organisation::create($organisationData);

        // Create contact
        $contactData = [
            'cle' => md5(uniqid(rand(), true)),
            'e_mail' => $formattedData['e_mail'],
            'nom' => $formattedData['nom'],
            'prenom' => $formattedData['prenom'],
            'telephone_fixe' => $request->input('telephone_fixe') ?? "",
            'service' => $request->input('service') ?? "",
            'fonction' => $request->input('fonction') ?? "",
            'organisation_id' => $organisation->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Contact::create($contactData);

        return redirect('/contacts')->with('success', 'Contact created successfully.');
    }

    public function update(Request $request, Contact $contact)
    {
        // Validation rules
        $request->validate([
            'e_mail' => 'required|email|unique:contact,e_mail,' . $contact->id,
            'nom' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'prenom' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'organisation_nom' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'adresse' => 'required|string',
            'code_postal' => 'required|string|max:255|regex:/^[0-9]+$/',
            'ville' => 'required|string|max:255',
            'statut' => 'required|string|max:20',
        ]);

        // Format the input data
        $formattedData = [
            'prenom' => ucwords($request->input('prenom')),
            'nom' => ucwords($request->input('nom')),
            'e_mail' => strtolower($request->input('e_mail')),
            'organisation_nom' => ucwords($request->input('organisation_nom')),
            'adresse' => $request->input('adresse'),
            'code_postal' => $request->input('code_postal'),
            'ville' => ucwords($request->input('ville')),
            'statut' => $request->input('statut'),
        ];

        // Check for duplicates
        if (Contact::where('prenom', $formattedData['prenom'])->where('nom', $formattedData['nom'])->where('id', '<>', $contact->id)->exists()) {
            return redirect()->back()->withErrors(['contact_exists' => 'A contact with the same name already exists.'])->withInput();
        }

        if (Organisation::where('nom', $formattedData['organisation_nom'])->where('id', '<>', $contact->organisation_id)->exists()) {
            return redirect()->back()->withErrors(['organisation_exists' => 'An organisation with the same name already exists.'])->withInput();
        }

        // Update organisation
        $organisationData = [
            'nom' => $formattedData['organisation_nom'],
            'adresse' => $formattedData['adresse'],
            'code_postal' => $formattedData['code_postal'],
            'ville' => $formattedData['ville'],
            'statut' => $formattedData['statut'],
            'updated_at' => now(),
        ];
        $contact->organisation->update($organisationData);

        // Update contact
        $contactData = [
            'e_mail' => $formattedData['e_mail'],
            'nom' => $formattedData['nom'],
            'prenom' => $formattedData['prenom'],
            'telephone_fixe' => $request->input('telephone_fixe') ?? "",
            'service' => $request->input('service') ?? "",
            'fonction' => $request->input('fonction') ?? "",
            'updated_at' => now(),
        ];
        $contact->update($contactData);

        return redirect('/contacts')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts')->with('success', 'Contact deleted successfully.');
    }
}
