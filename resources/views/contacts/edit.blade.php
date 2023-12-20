@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Modifică datele despre eveniment</div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($contact, ['method' => 'PATCH','route' => ['contacts.update', $contact->id]]) !!}
                <div class="form-group">
                    <label for="name">Nume:</label>
                    <input type="text" name="name" class="form-control" value="{{$contact->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="{{$contact->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Telefon:</label>
                    <input type="text" name="phone" class="form-control" value="{{$contact->phone }}">
                </div>
            <div class="form-group">
                <input type="submit" value="Salvează modificările" class="btn btn-info">
                <a href="{{route('contacts.index') }}" class="btn btn-default">Anulează</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
