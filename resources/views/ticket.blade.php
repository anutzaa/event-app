@extends('cartlayout')

@section('title', 'Tickets')

@section('content')
    <div class="container tickets">
        <div class="row">
            @foreach($tickets as $ticket)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>{{ $ticket->name }}</h4>
                            <p>{{ Illuminate\Support\Str::limit(strtolower($ticket->description), 50) }}</p>
                            <p><strong>Pret: </strong> {{ $ticket->price }}$ {{ $ticket->type }} </p>
                            <p class="btn-holder">
                                <a href="{{ url('add-to-cart/'.$ticket->id) }}" class="btn btn-warning btn-block text-center" role="button">Pune in cos</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>
@endsection
