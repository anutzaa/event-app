<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakerController extends Controller
{
     //Display a listing of the resource.
    public function index(Request $request)
    {
        $speakers = Speaker::orderBy('name', 'ASC')->paginate(9);
        $value = ($request->input('page', 1)-1)*9;
        return view('speakers.list', compact('speakers'))->with('i', $value);
    }


     //Show the form for creating a new resource.
    public function create()
    {
        return view('speakers.create');
    }


     //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required',
                                   'email' => 'required',
                                   'phone' => 'required',
                                   'address' => 'required',
            ]);
        // create new speaker
        Speaker::create($request->all());
        return redirect()->route('speakers.index')->with('success', 'Speakerul a fost adăugat cu succes!');
    }


    //Display the specified resource.
    public function show($id)
    {
        $speaker = Speaker::find($id);
        return view('speakers.show',compact('speaker'));
    }


    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $speaker = Speaker::find($id);
        return view('speakers.edit', compact('speaker'));
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
        Speaker::find($id)->update($request->all());
        return redirect()->route('speakers.index')->with('success','Datele despre speaker au fost actualizate cu succes!');
    }


    //Remove the specified resource from storage.
    public function destroy($id)
    {
        Speaker::find($id)->delete();
        return redirect()->route('speakers.index')->with('success','Speakerul a fost șters cu succes!');
    }
}
