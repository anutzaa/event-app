@extends('layouts.app')
@section('title', 'events')
@section('content')
    <div class="container products">
        <div class="row">
            @foreach($events as $event)
                <div class="col-xs-18 col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>{{ $event->title }}</h4>
                            <p>{{ Illuminate\Support\Str::limit($event->description), 50}}</p>
                            <p><strong>Data: </strong>{{ \Carbon\Carbon::parse($event->date)->format('d.m.Y') }}, ora {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                            <p><strong>Locație: </strong>{{ $event->location }}</p>
                            <p class="btn-holder">
                                <a href="{{ route('view', $event->id) }}" class="btn btn-primary btn-block text-center" role="button">Detalii Eveniment</a>
                                <a href="{{ route('tickets') }}" class="btn btn-primary btn-success text-center" role="button">Cumpără bilet</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>

    <!-- Add this script to handle the addToCart functionality -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function addToCart(eventId) {
            console.log('Button clicked with eventId:', eventId);

            $.ajax({
                url: '{{ url('add-to-cart-from-event') }}/' + eventId,
                method: 'get',
                success: function (response) {
                    console.log('Ajax success:', response);
                },
                error: function (error) {
                    console.error('Ajax error:', error);
                }
            });
        }
    </script>
@endsection
