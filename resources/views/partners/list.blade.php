@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Catalogul de parteneri</h1>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/partners/create" class="btn btn-default">Adaugă un partener nou</a>
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
                @if (count($partners) > 0)
                    @foreach ($partners as $key => $partner)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->email }}</td>
                            <td>{{ $partner->phone }}</td>
                            <td>{{ $partner->address }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('partners.show',$partner->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('partners.edit',$partner->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' =>
                               ['partners.destroy', $partner->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu există parteneri în catalog!</td>
                    </tr>
                @endif
            </table>
            {{$partners->render()}}
        </div>
    </div>
@endsection
