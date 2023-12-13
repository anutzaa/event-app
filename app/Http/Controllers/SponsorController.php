<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    //Display a listing of the resource.
    public function index(Request $request)
    {
        $sponsors = Sponsor::orderBy('name', 'ASC')->paginate(9);
        $value = ($request->input('page', 1)-1)*9;
        return view('sponsors.list', compact('sponsors'))->with('i', $value);
    }


    //Show the form for creating a new resource.
    public function create()
    {
        return view('sponsors.create');
    }


    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        // create new sponsor
        Sponsor::create($request->all());
        return redirect()->route('sponsors.index')->with('success', 'Sponsorul a fost adăugat cu succes!');
    }


    //Display the specified resource.
    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.show',compact('sponsor'));
    }


    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.edit', compact('sponsor'));
    }


    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Sponsor::find($id)->update($request->all());
        return redirect()->route('sponsors.index')->with('success','Datele despre sponsor au fost actualizate cu succes!');
    }


    //Remove the specified resource from storage.
    public function destroy($id)
    {
        Sponsor::find($id)->delete();
        return redirect()->route('sponsors.index')->with('success','Sponsorul a fost șters cu succes!');
    }
}
