@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Vizualizare sponsor</h1>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="{{ route('sponsors.index') }}">Înapoi</a>
            </div>
            <div class="form-group">
                <strong>Nume: </strong> {{ $sponsor->name }}
            </div>
            <div class="form-group">
                <strong>Email: </strong> {{ $sponsor->email }}
            </div>
            <div class="form-group">
                <strong>Telefon: </strong> {{ $sponsor->phone }}
            </div>
            <div class="form-group">
                <strong>Adresa: </strong> {{ $sponsor->address }}
            </div>
        </div>
    </div>
@endsection
