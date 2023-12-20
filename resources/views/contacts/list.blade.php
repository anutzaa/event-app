@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Catalogul de contacte
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/contacts/create" class="btn btn-default">Adaugă un contact nou</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">ID</th>
                    <th>Nume</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($contacts) > 0)
                    @foreach ($contacts as $key => $contact)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('contacts.show',$contact->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('contacts.edit',$contact->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['contacts.destroy', $contact->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există contacte în catalog!</td>
                    </tr>
                @endif
            </table>
            {{$contacts->render()}}
        </div>
    </div>
@endsection
