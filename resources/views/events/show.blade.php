@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare eveniment
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('events.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Titlul evenimentului: </strong> {{ $event->title }}
            </div>
            <div class="form-group">
                <strong>Descriere: </strong> {{ $event->description }}
            </div>
            <div class="form-group">
                <strong>Data: </strong> {{ $event->date }}
            </div>
            <div class="form-group">
                <strong>Ora: </strong> {{ $event->time }}
            </div>
            <div class="form-group">
                <strong>Locația: </strong> {{ $event->location }}
            </div>
            <div class="form-group">
                <strong>Contact: </strong> {{ $event->contact }}
            </div>
        </div>
    </div>
@endsection
