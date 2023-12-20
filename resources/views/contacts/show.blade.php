@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Vizualizare contact</h1>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('contacts.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $contact->name }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $contact->email }}
            </div>
            <div class="form-group">
                <strong>Telefon: </strong> {{ $contact->phone }}
            </div>
        </div>
    </div>
@endsection
