@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Catalogul de sponsori</h1>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/sponsors/create" class="btn btn-default">Adaugă un sponsor nou</a>
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
                @if (count($sponsors) > 0)
                    @foreach ($sponsors as $key => $sponsor)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $sponsor->name }}</td>
                            <td>{{ $sponsor->email }}</td>
                            <td>{{ $sponsor->phone }}</td>
                            <td>{{ $sponsor->address }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('sponsors.show',$sponsor->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('sponsors.edit',$sponsor->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['sponsors.destroy', $sponsor->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există sponsori în catalog!</td>
                    </tr>
                @endif
            </table>
            {{$sponsors->render()}}
        </div>
    </div>
@endsection
