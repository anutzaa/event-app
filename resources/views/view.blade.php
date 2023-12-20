@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('home') }}">Înapoi</a>
            </div>
            <div class="form-group" style="text-align: center;">
                <strong><h1>{{ $event->title }} </h1> </strong>
            </div>
            <br>
            <div style="text-align: center; margin-left:350px; margin-right: 350px" >
                <h3>{{ $event->description }}</h3>
            </div>
            <br>
            <div class="form-group" style="text-align: center;">
                <h4><strong>Data:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d.m.Y') }}</h4>
            </div>
            <div class="form-group" style="text-align: center;">
                <h4><strong>Ora:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</h4>
            </div>
            <div class="form-group" style="text-align: center;">
                <h4><strong>Locația: </strong> {{ $event->location }} </h4>
            </div>
        <br>
        <br>
            <div class="form-group" style="text-align: center;">
                <h4>Îl vom avea alături pe<strong>  {{ $event->speaker->name }}</strong> în calitate de speaker.</h4>
            </div>
            <div class="form-group" style="text-align: center;">
                <h4>Sponsorul evenimentului este compania <strong>{{ $event->sponsor->name }} </strong>.</h4>
            </div>
            <div class="form-group" style="text-align: center;">
                <h4> Partenerul evenimentului este <strong> {{ $event->partner->name }}</strong>.</h4>
            </div>
        <br>
        <br>
        <br>

            <div style="text-align: center;">
                <a href="{{ url('add-to-cart/'.$event->id) }}" class="btn btn-warning btn-block text-center" role="button" >Cumpără Bilet</a>
            </div>
            <br>
            <br>
        <div class="form-group" style="text-align: center;">
            <h5><strong>Pentru detalii, contactați-ne la tel. </strong> <br>{{ $event->contact->phone}} <br> <a href="mailto:{{$event->contact->email}}">{{$event->contact->email}}</a> <br> ({{$event->contact->name}})  </h5>
        </div>
        </div>
    </div>
@endsection

