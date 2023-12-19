
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
                            <p>{{ Illuminate\Support\Str::limit(strtolower($event->description), 50) }}</p>
                            <p><strong>Data și Ora: </strong>{{ $event->date }} - {{ $event->time }}</p>
                            <p><strong>Locație: </strong>{{ $event->location }}</p>
                            <p class="btn-holder">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-block text-center" role="button">Detalii Eveniment</a>
                                <a href="{{ url('add-to-cart/'.$event->id) }}" class="btn btn-warning btn-block text-center" role="button">Cumpără Bilet</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>
@endsection
