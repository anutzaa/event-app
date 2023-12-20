<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //Display a listing of the resource.
    public function index(Request $request)
    {
        $contacts = Contact::orderBy('name', 'ASC')->paginate(9);
        $value = ($request->input('page', 1)-1)*9;
        return view('contacts.list', compact('contacts'))->with('i', $value);
    }


    //Show the form for creating a new resource.
    public function create()
    {
        return view('contacts.create');
    }


    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contactul a fost adăugat cu succes!');
    }


    //Display the specified resource.
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show',compact('contact'));
    }


    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }


    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        Contact::find($id)->update($request->all());
        return redirect()->route('contacts.index')->with('success','Datele despre contact au fost actualizate cu succes!');
    }


    //Remove the specified resource from storage.
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contacts.index')->with('success','Contactul a fost șters cu succes!');
    }
}
