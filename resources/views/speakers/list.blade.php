@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Catalogul de speakeri</h1>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/speakers/create" class="btn btn-default">Adaugă un speaker nou</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">ID</th>
                    <th>Nume</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Adresa</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($speakers) > 0)
                    @foreach ($speakers as $key => $speaker)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $speaker->name }}</td>
                            <td>{{ $speaker->email }}</td>
                            <td>{{ $speaker->phone }}</td>
                            <td>{{ $speaker->address }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('speakers.show',$speaker->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('speakers.edit',$speaker->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['speakers.destroy', $speaker->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există speakeri în catalog!</td>
                    </tr>
                @endif
            </table>
            {{$speakers->render()}}
        </div>
    </div>
@endsection
