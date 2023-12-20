<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket', compact('tickets'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            abort(404);
        }

        $cart = session()->get('cart');

        // If cart is empty, add the first ticket
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $ticket->name,
                    "quantity" => 1,
                    "price" => $ticket->price,
                    "type" => $ticket->type
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'ticket adaugat cu succes in cos!');
        }

        // If cart is not empty, check if the ticket exists to increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'ticket adaugat cu succes in cos!');
        }

        // If item does not exist in cart, add it to the cart with quantity = 1
        $cart[$id] = [
            "name" => $ticket->name,
            "quantity" => 1,
            "price" => $ticket->price,
            "type" => $ticket->type
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'ticket adaugat cu succes in cos!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cos modificat cu succes');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'ticket sters cu succes!');
        }
    }
}
