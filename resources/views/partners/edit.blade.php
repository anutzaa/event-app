@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h1>Modifică datele despre partener</h1></div>
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
            {!! Form::model($partner, ['method' => 'PATCH','route' => ['partners.update', $partner->id]]) !!}
                <div class="form-group">
                    <label for="name">Nume:</label>
                    <input type="text" name="name" class="form-control" value="{{$partner->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="{{$partner->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Telefon:</label>
                    <input type="text" name="phone" class="form-control" value="{{$partner->phone }}">
                </div>
                <div class="form-group">
                    <label for="address">Adresă:</label>
                    <input type="text" name="address" class="form-control" value="{{$partner->address }}">
                </div>
            <div class="form-group">
                <input type="submit" value="Salvează modificările" class="btn btn-info">
                <a href="{{route('partners.index') }}" class="btn btn-default">Anulează</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
