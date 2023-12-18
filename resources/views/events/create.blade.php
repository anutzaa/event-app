@extends('cartlayout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Adaugă Eveniment Nou</div>
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
            {{ Form::open(array('route' => 'events.store','method'=>'POST')) }}
            <div class="form-group">
                <label for="name">Nume</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="price">Pret</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
            </div>
            <div class="form-group">
                <label for="event_type">Tipul Evenimentului</label>
                <input type="text" name="event_type" class="form-control" value="{{ old('event_type') }}">
            </div>
            <div class="form-group">
                <label for="location">Locatie</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}"></div>
            <div class="form-group">
                <label for="contact_name">Contact</label>
                <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name') }}"></div>
            <div class="form-group">
                <label for="">Speaker</label>
                <input type="text" name="speakers" class="form-control" value="{{ old('speakers') }}"></div>
            <div class="form-group">
                <label for="">Sponsori</label>
                <input type="text" name="sponsors" class="form-control" value="{{ old('sponsors') }}"></div>
            <div class="form-group">
                <label for="">Parteneri</label>
                <input type="text" name="partners" class="form-control" value="{{ old('partners') }}"></div>
            <div class="form-group">
                <input type="submit" value="Adauga Eveniment" class="btn btn-info">
                <a href="{{ route('cart') }}" class="btn btndefault">Cancel</a>
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
