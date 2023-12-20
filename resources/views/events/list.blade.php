@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Catalogul de evenimente
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/events/create" class="btn btn-default">Adaugă un eveniment nou</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">ID</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th>Data</th>
                    <th>Ora</th>
                    <th>Locația</th>
                    <th>Contact</th>
                    <th>Speaker</th>
                    <th>Sponsor</th>
                    <th>Partener</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($events) > 0)
                    @foreach ($events as $key => $event)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->time }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->contact->name }}</td>
                            <td>{{ $event->speaker->name }}</td>
                            <td>{{ $event->sponsor->name }}</td>
                            <td>{{ $event->partner->name }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('events.show',$event->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('events.edit',$event->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['events.destroy', $event->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există evenimente în catalog!</td>
                    </tr>
                @endif
            </table>
            {{$events->render()}}
        </div>
    </div>
@endsection
