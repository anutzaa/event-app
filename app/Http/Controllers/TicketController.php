<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.list', compact('tickets'));
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

        //Verificam daca avem deja bilet in cos
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            //Verificam daca mai sunt bilete dispobibile
            if ($ticket->available > 0) {
                $cart[$id] = [
                    "name" => $ticket->type,
                    "quantity" => 1,
                    "price" => $ticket->price,
                    "photo" => $ticket->available
                ];
                //micsoram numarul de bilete disponibile
                $ticket->available--;
                $ticket->save();
            } else {
                return redirect()->back()->with('error', 'Nu mai sunt bilete disponibile!');
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Bilet adăugat cu succes în coș!');
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
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Coșul a fost actualizat!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                // Increment the 'available' attribute
                $ticket = Ticket::find($request->id);
                $ticket->available++;
                $ticket->save();

                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Bilet șters cu succes!');
        }
    }
}
