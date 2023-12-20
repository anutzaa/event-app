<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Stripe\Stripe;
use Stripe\Checkout\Session;


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

    /**
     * Create a checkout session for Stripe.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function checkout(Request $request)
    {
        // Retrieve the cart data from the session or however you store it
        $cart = session()->get('cart');

        // Check if the cart is empty
        if (empty($cart)) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        try {
            // Set your Stripe secret key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Calculate the total amount based on your cart data
            $totalAmount = $this->calculateTotalAmount($cart);

            // Check if the total amount is valid
            if ($totalAmount <= 0) {
                return response()->json(['error' => 'Invalid total amount'], 400);
            }

            // Create a Stripe Checkout session
            $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $this->prepareLineItems($cart),
                'mode' => 'payment',
                'success_url' => route('checkout.success'),
                'cancel_url' => route('cart'), // Redirect to cart if the user cancels
            ]);

            // Return the session ID in JSON format
            return response()->json(['id' => $checkout_session->id]);
        } catch (\Exception $e) {
            // Handle exceptions (e.g., Stripe API errors)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Other existing methods...

    private function calculateTotalAmount($cart)
    {
        // Implement your logic to calculate the total amount from the cart data
        // ...

        return 1000; // Replace with your logic
    }

    private function prepareLineItems($cart)
    {
        // Implement your logic to prepare line items for the Stripe Checkout session
        // ...

        return [
            [
                'price_data' => [
                    'currency' => 'RON', // Set your currency code here
                    'product_data' => [
                        'name' => 'Product Name',
                    ],
                    'unit_amount' => 1000, // Set your unit amount here
                ],
                'quantity' => 1, // Set the quantity based on your cart data
            ],
        ];
    }
    public function createTicket()
    {
        return view('events.create');
    }
}

