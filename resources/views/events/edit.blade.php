@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h1>Modifică datele despre eveniment</h1></div>
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
            {!! Form::model($event, ['method' => 'PATCH', 'route' => ['events.update', $event->id]]) !!}
            <div class="form-group">
                <label for="title">Titlu</label>
                <input type="text" name="title" class="form-control" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="description">Descriere</label>
                <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" class="form-control" value="{{ $event->date }}">
            </div>
            <div class="form-group">
                <label for="time">Ora</label>
                <input type="time" name="time" class="form-control" value="{{ $event->time }}">
            </div>
            <div class="form-group">
                <label for="location">Locația</label>
                <input type="text" name="location" class="form-control" value="{{ $event->location }}">
            </div>

                <div class="form-group">
                    <label for="contact_id">Contact</label>
                    <div class="input-group mb-3">
                        <select name="contact_id" class="form-control">
                            <option value="">Selectează un contact</option>
                            @foreach($contacts as $contactOption)
                                <option value="{{ $contactOption->id }}" {{ $event->contact_id == $contactOption->id ? 'selected' : '' }}>
                                    {{ $contactOption->name }}
                                </option>
                            @endforeach
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
                            @foreach($speakers as $speakerOption)
                                <option value="{{ $speakerOption->id }}" {{ $event->speaker_id == $speakerOption->id ? 'selected' : '' }}>
                                    {{ $speakerOption->name }}
                                </option>
                            @endforeach
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
                            @foreach($sponsors as $sponsorOption)
                                <option value="{{ $sponsorOption->id }}" {{ $event->sponsor_id == $sponsorOption->id ? 'selected' : '' }}>
                                    {{ $sponsorOption->name }}
                                </option>
                            @endforeach
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
                            @foreach($partners as $partnerOption)
                                <option value="{{ $partnerOption->id }}" {{ $event->partner_id == $partnerOption->id ? 'selected' : '' }}>
                                    {{ $partnerOption->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a href="{{ route('partners.create') }}" class="btn btn-success">Adaugă partener</a>
                        </div>
                    </div>
                </div>


            <div class="form-group">
                <input type="submit" value="Salvează modificările" class="btn btn-info">
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
