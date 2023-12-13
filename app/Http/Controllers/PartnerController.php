<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    //Display a listing of the resource.
    public function index(Request $request)
    {
        $partners = Partner::orderBy('name', 'ASC')->paginate(9);
        $value = ($request->input('page', 1)-1)*9;
        return view('partners.list', compact('partners'))->with('i', $value);
    }


    //Show the form for creating a new resource.
    public function create()
    {
        return view('partners.create');
    }


    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        // create new partner
        Partner::create($request->all());
        return redirect()->route('partners.index')->with('success', 'Partenerul a fost adăugat cu succes!');
    }


    //Display the specified resource.
    public function show($id)
    {
        $partner = Partner::find($id);
        return view('partners.show',compact('partner'));
    }


    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('partners.edit', compact('partner'));
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
        Partner::find($id)->update($request->all());
        return redirect()->route('partners.index')->with('success','Datele despre partener au fost actualizate cu succes!');
    }


    //Remove the specified resource from storage.
    public function destroy($id)
    {
        Partner::find($id)->delete();
        return redirect()->route('partners.index')->with('success','Partenerul a fost șters cu succes!');
    }
}
