@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <a href="{{ route('events.index') }}" class="btn btn-primary">View All Events</a>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
