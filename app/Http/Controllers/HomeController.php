<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (auth()->user()->user_type === 'Administrator') {
            // If admin is logged in, redirect to admin dashboard
            return view('admin.dashboard');
        }

        // If not admin, proceed with regular user logic
        $events = Event::orderBy('id', 'ASC')->paginate(6);
        return view('home', compact('events'));
    }

    public function view($eventId)
    {
        $event = Event::find($eventId);
        if (!$event) {
            abort(404); // Event not found
        }
        return view('view', compact('event'));
    }
}
