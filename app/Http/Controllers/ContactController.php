<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->only([
            'index',
            'show',
            'destroy'
        ]);
        
        $this->middleware('verify.accept.only.json.request')->only('store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {   
        return new ContactResource(Contact::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
