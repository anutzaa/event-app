<!-- resources/views/checkout.blade.php -->

@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
    <!-- Your existing cart table here -->

    <a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

    <!-- Stripe Checkout form -->
    <div class="container mt-4">
        <h2>Payment Details</h2>
        <form id="payment-form">
            <div class="form-group">
                <label for="card-holder-name">Cardholder Name</label>
                <input type="text" id="card-holder-name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="card-element">Card Details</label>
                <div id="card-element" class="form-control"></div>
            </div>
            <button id="card-button" class="btn btn-primary">Pay Now</button>
        </form>
    </div>

    <div id="error-message" role="alert"></div>

    @section('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('pk_test_51OH7g3J8NGqPZGbSOaSzPuVwwkM9e5qdhj8TlBipKFD5a663XnNQLwsWWe38m8eee2jKDLB8GWxA8zByGX8LGZkz00Ceg7M6Jt'); // Replace with your actual publishable key
            var elements = stripe.elements();
            var card = elements.create('card');
            card.mount('#card-element');

            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('error-message');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        var errorElement = document.getElementById('error-message');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // You can add additional data to be sent to the server along with the token
                var data = {
                    token: token.id,
                    // Add any other data you need to send
                };

                // Use fetch or your preferred method to send the data to the server
                fetch('/checkout/process', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // Add any other headers if needed
                    },
                    body: JSON.stringify(data),
                })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response from the server (e.g., redirect to success page)
                        console.log(data);
                        // Replace the following line with your desired success action
                        window.location.href = '/checkout/success';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle errors as needed
                    });
            }
        </script>
    @endsection
@endsection
