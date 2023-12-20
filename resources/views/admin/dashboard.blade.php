@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panou de control</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <a href="{{ route('events.index') }}" class="btn btn-primary">Toate evenimentele</a>
                            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Toate contactele</a>
                            <a href="{{ route('speakers.index') }}" class="btn btn-primary">Toți speakerii</a>
                            <a href="{{ route('sponsors.index') }}" class="btn btn-primary">Toți sponsorii</a>
                            <a href="{{ route('partners.index') }}" class="btn btn-primary">Toți partenerii</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
