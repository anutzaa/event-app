<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Partner;
use App\Http\Requests;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::orderBy('id','ASC')->paginate(6);
        $value=($request->input('page',1)-1)*6;
        return view('events.list',compact('events'))->with('i',$value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // ...

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'contact_name' => 'required',
            'contact_surname' => 'required',
            'speakers' => 'required|array',
            'sponsors' => 'required|array',
            'partners' => 'required|array',
        ]);

        // Find or create Contact
        $contact = Contact::firstOrCreate([
            'name' => $request->input('contact_name'),
            'surname' => $request->input('contact_surname'),
        ]);

        // Create Event
        $event = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'contact_id' => $contact->id,
        ]);

        // Attach Speakers to Event
        $event->speakers()->sync($request->input('speakers'));

        // Attach Sponsors to Event
        $event->sponsors()->sync($request->input('sponsors'));

        // Attach Partners to Event
        $event->partners()->sync($request->input('partners'));

        return redirect()->route('events.index')->with('success', 'Evenimentul a fost adăugat cu succes!');
    }

// ...



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'contact_name' => 'required',
            'contact_surname' => 'required',
            'speakers' => 'required|array',
            'sponsors' => 'required|array',
            'partners' => 'required|array',
        ]);

        // Find or create Contact
        $contact = Contact::firstOrCreate([
            'name' => $request->input('contact_name'),
            'surname' => $request->input('contact_surname'),
        ]);

        // Update Event
        $event = Event::find($id);
        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'contact_id' => $contact->id,
        ]);

// Update Speakers, Sponsors, and Partners relationships
        $event->speakers()->sync($request->input('speakers'));
        $event->sponsors()->sync($request->input('sponsors'));
        $event->partners()->sync($request->input('partners'));

        return redirect()->route('events.index')->with('success', 'Evenimentul a fost actualizat cu succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success', 'Evenimentul a fost șters cu succes!');
    }
}
