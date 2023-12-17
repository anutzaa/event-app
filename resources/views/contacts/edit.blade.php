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
            {!! Form::model($event, ['method' => 'PATCH','route' => ['events.update', $event->id]]) !!}
                <div class="form-group">
                    <label for="title">Titlu</label>
                    <input type="text" name="titlu" class="form-control" value="{{$event->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Descriere</label>
                    <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="date" name="date" class="form-control" value="{{$event->date }}">
                </div>
                <div class="form-group">
                    <label for="time">Ora</label>
                    <input type="time" name="time" class="form-control" value="{{$event->time }}">
                </div>
                <div class="form-group">
                    <label for="location">Locația</label>
                    <input type="text" name="location" class="form-control" value="{{$event->location }}">
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control" value="{{$event->contact }}">
                </div>
            <div class="form-group">
                <input type="submit" value="Salvează modificările" class="btn btn-info">
                <a href="{{route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
