<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use App\Policies\ContactPolicy;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ContactResource;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->only(['index', 'show', 'destroy']);
        $this->middleware('verify.accept.only.json.request')->only('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Contact $contact)
    {
        $this->authorize('view', $contact);
        
        return view('admin.contacts.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {   
        return (new ContactResource(Contact::create($request->all())))->additional([
            'message' => __('lang.created.success')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $this->authorize('show', $contact);

        return view('admin.contacts.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();
    }
}
