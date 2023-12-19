@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h1>Adaugă un nou speaker</h1></div>
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open(array('route' => 'speakers.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="name">Nume:</label>
                    <input type="text" name="name" class="form-control"
                           value="{{old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control"
                           value="{{old('email') }}">
                </div>

                <div class="form-group">
                    <label for="phone">Telefon:</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{old('phone') }}">
                </div>

                <div class="form-group">
                    <label for="address">Adresa:</label>
                    <input type="text" name="address" class="form-control"
                           value="{{old('address') }}">
                </div>

                <div class="form-group">
                    <input type="submit" value="Adaugă speakerul" class="btn btn-info">
                    <a href="{{ route('speakers.index') }}" class="btn btn-default">Anulează</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
