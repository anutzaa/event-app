<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Evenimente</title>
    <!-- Bootstrap CSS File -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Exemplu aplicație Laravel CRUD</a>
            </div>
            <ul class="nav navbar-nav">
            </ul>
        </div>
    </nav>
    <div>
        <h1></h1>
    </div>
    @extends('layouts.master')
    @section('content')
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista sarcinilor
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="pull-right">
                        <a href="/events/create" class="btn btn-default">Adăugare Sarcină Nouă</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="20">No</th>
                        <th>Titlu</th>
                        <th>Descriere</th>
                        <th width="300">Acțiune</th>
                    </tr>
                    @if (count($events) > 0)
                        @foreach ($events as $key => $event)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->description }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('events.show', $event->id) }}">Vizualizare</a>
                                    <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">Modificare</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id], 'style' => 'display:inline']) }}
                                    {{ Form::submit('Ștergere', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Nu există sarcini!</td>
                        </tr>
                    @endif
                </table>
                <!-- Introduce numărul paginii -->
                {{ $events->render() }}
            </div>
        </div>
    @endsection
</div>
</body>
</html>
