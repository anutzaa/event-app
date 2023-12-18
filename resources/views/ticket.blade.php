@extends('cartlayout')
@section('title', 'Tickets')
@section('content')
    <div class="container tickets">
        <div class="row">
            @foreach($tickets as $ticket)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <h3>{{ $ticket->type }}</h3>
                        <div class="caption">
                            <p><h4><strong>Preț: </strong>{{ $ticket->price }}$</h4></p>
                            <!--p>{{ Str::limit(strtolower($ticket->description), 50) }}</--p-->
                            <p><strong>Bilete rămase: </strong>{{ Str::limit(strtolower($ticket->available), 50) }}</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$ticket->id) }}" class="btn btn-warning btn-block text-center"
                                <a href="{{ route('events.create') }}" class="btn btn-warning btn-block text-center" role="button">Adaugă în coș</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>
@endsection

