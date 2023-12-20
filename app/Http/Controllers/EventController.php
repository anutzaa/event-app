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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // Fetch events from the database
        $events = Event::orderBy('id', 'ASC')->paginate(6);

        // Calculate the value for pagination
        $value = ($request->input('page', 1) - 1) * 6;

        // Pass the events to the view
        return view('events.list', compact('events'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Pregătește datele necesare pentru pagina, dacă este cazul
        $contacts = Contact::all();
        $speakers = Speaker::all();
        $sponsors = Sponsor::all();
        $partners = Partner::all();

        return view('events.create', compact('contacts', 'speakers', 'sponsors', 'partners'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'contact_id' => 'required|exists:contacts,id',
            'speaker_id' => 'exists:speakers,id',
            'sponsor_id' => 'exists:sponsors,id',
            'partner_id' => 'exists:partners,id',
        ]);

        // Find Contact
        $contact = Contact::find($request->input('contact_id'));

        // Find Speaker
        $speaker = Speaker::find($request->input('speaker_id'));

        // Find Sponsor
        $sponsor = Sponsor::find($request->input('sponsor_id'));

        // Find Partner
        $partner = Partner::find($request->input('partner_id'));

        // Create Event
        $event = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'contact_id' => $contact->id,
            'speaker_id' => $speaker ? $speaker->id : null,
            'sponsor_id' => $sponsor ? $sponsor->id : null,
            'partner_id' => $partner ? $partner->id : null,
        ]);

        return redirect()->route('events.index')->with('success', 'Evenimentul a fost adăugat cu succes!');
    }



    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $contacts = Contact::all();
        $speakers = Speaker::all();
        $sponsors = Sponsor::all();
        $partners = Partner::all();

        return view('events.edit', compact('event', 'contacts', 'speakers', 'sponsors', 'partners'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'contact_id' => 'required',
            'speaker_id' => 'required',
            'sponsor_id' => 'required',
            'partner_id' => 'required',
        ]);

        // Find Contact
        $contact = Contact::find($request->input('contact_id'));

        // Find Speaker
        $speaker = Speaker::find($request->input('speaker_id'));

        // Find Sponsor
        $sponsor = Sponsor::find($request->input('sponsor_id'));

        // Find Partner
        $partner = Partner::find($request->input('partner_id'));

        // Update Event
        $event = Event::find($id);

        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'contact_id' => $contact ? $contact->id : null,
            'speaker_id' => $speaker ? $speaker->id : null,
            'sponsor_id' => $sponsor ? $sponsor->id : null,
            'partner_id' => $partner ? $partner->id : null,
        ]);

        return redirect()->route('events.index')->with('success', 'Evenimentul a fost actualizat cu succes!');
    }



    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success', 'Evenimentul a fost șters cu succes!');
    }
}
