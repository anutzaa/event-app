@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă un nou eveniment</div>
        <div class="panel-body">
                <div class="alert alert-danger">
                </div>
            {{ Form::open(array('route' => 'events.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="name">Titlu</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Descriere</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
            </div>
            <div class="form-group">
                <label for="time">Ora</label>
                <input type="time" name="time" class="form-control" value="{{ old('time') }}">
            </div>
            <div class="form-group">
                <label for="location">Locația</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" class="form-control" value="{{ old('contact') }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Adaugă eveniment" class="btn btn-info">
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
