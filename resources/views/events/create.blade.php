@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h1>Adaugă un nou eveniment</h1></div>
        <div class="panel-body">
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
                <label for="contact_id">Contact</label>
                <div class="input-group mb-3">
                    <select name="contact_id" class="form-control">
                        <option value="">Selectează un contact</option>
                        @if(isset($contacts))
                            @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <a href="{{ route('contacts.create') }}" class="btn btn-success">Adaugă contact</a>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="speaker_id">Speaker</label>
                <div class="input-group mb-3">
                    <select name="speaker_id" class="form-control">
                        <option value="">Selectează un speaker</option>
                        @if(isset($speakers))
                            @foreach($speakers as $speaker)
                                <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <a href="{{ route('speakers.create') }}" class="btn btn-success">Adaugă speaker</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="sponsor_id">Sponsor</label>
                <div class="input-group mb-3">
                    <select name="sponsor_id" class="form-control">
                        <option value="">Selectează un sponsor</option>
                        @if(isset($sponsors))
                            @foreach($sponsors as $sponsor)
                                <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <a href="{{ route('sponsors.create') }}" class="btn btn-success">Adaugă sponsor</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="partner_id">Partener</label>
                <div class="input-group mb-3">
                    <select name="partner_id" class="form-control">
                        <option value="">Selectează un partener</option>
                        @if(isset($partners))
                            @foreach($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <a href="{{ route('partners.create') }}" class="btn btn-success">Adaugă partener</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Adaugă eveniment" class="btn btn-info">
                <a href="{{ route('events.index') }}" class="btn btn-default">Anulează</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
