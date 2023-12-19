@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h1>Adaugă un nou eveniment</h1></div>
        <div class="panel-body">
            {{ Form::open(array('route' => 'events.store', 'method' => 'POST')) }}
            <div class="form-group">
                <label for="name">Titlu</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Descriere</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
            </div>
            <div class="form-group">
                <label for="time">Ora</label>
                <input type="time" name="time" class="form-control" value="{{ old('time') }}">
            </div>
            <div class="form-group">
                <label for="location">Locația</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}">
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <div class="input-group mb-3">
                    <select name="contact" class="form-control">
                        <option value="">Selectează un contact</option>
                        @if(isset($contacts))
                            @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->name }} {{ $contact->surname }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <a href="{{ route('contacts.create') }}" class="btn btn-success">Adaugă contact</a>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="speakers">Speakeri</label>
                <div id="speakers-container">
                    <div class="input-group mb-3">
                        <input type="text" name="speakers[]" class="form-control" value="{{ old('speakers.0') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-info" onclick="addInput('speakers-container')">Adaugă</button>
                            <button type="button" class="btn btn-danger" onclick="removeInput(this)">Șterge</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="sponsors">Sponsori</label>
                <div id="sponsors-container">
                    <div class="input-group mb-3">
                        <input type="text" name="sponsors[]" class="form-control" value="{{ old('sponsors.0') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-info" onclick="addInput('sponsors-container')">Adaugă</button>
                            <button type="button" class="btn btn-danger" onclick="removeInput(this)">Șterge</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="partners">Parteneri</label>
                <div id="partners-container">
                    <div class="input-group mb-3">
                        <input type="text" name="partners[]" class="form-control" value="{{ old('partners.0') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-info" onclick="addInput('partners-container')">Adaugă</button>
                            <button type="button" class="btn btn-danger" onclick="removeInput(this)">Șterge</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Adaugă eveniment" class="btn btn-info">
                <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <script>
        function addInput(containerId) {
            var container = document.getElementById(containerId);

            // Create a new input element
            var input = document.createElement('input');
            input.type = 'text';
            input.name = containerId.replace('-container', '') + '[]'; // Add [] to make it an array
            input.className = 'form-control';

            // Create a delete button
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-danger';
            deleteButton.innerHTML = 'Șterge';
            deleteButton.onclick = function() {
                removeInput(this);
            };

            // Create a container for input and buttons
            var inputContainer = document.createElement('div');
            inputContainer.className = 'input-group mb-3';
            inputContainer.appendChild(input);

            // Append both buttons to the container
            var buttonGroup = document.createElement('div');
            buttonGroup.className = 'input-group-append';
            buttonGroup.appendChild(deleteButton);

            // Append the new input container to the main container
            inputContainer.appendChild(buttonGroup);
            container.appendChild(inputContainer);
        }

        function removeInput(button) {
            // Get the parent container and remove it
            var container = button.parentNode.parentNode;
            container.parentNode.removeChild(container);
        }
    </script>
@endsection
