<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Add this line
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('id', 'ASC')->paginate(6);
        return view('home', compact('events'));
    }
}
