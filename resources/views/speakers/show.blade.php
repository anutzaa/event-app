@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Vizualizare speaker</h1>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('speakers.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $speaker->name }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $speaker->email }}
            </div>
            <div class="form-group">
                <strong>Telefon: </strong> {{ $speaker->phone }}
            </div>
            <div class="form-group">
                <strong>Adresa: </strong> {{ $speaker->address }}
            </div>
        </div>
    </div>
@endsection
