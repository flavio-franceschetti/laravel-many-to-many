@extends('layouts.app')

@section('content')
    <h3>Inserisci un nuovo progetto</h3>
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="github" class="form-label">Github</label>
            <input type="text" class="form-control" id="github" name="github" value="{{ old('github') }}">
            @error('github')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <label for="type">Tipo:</label>
        <select name="type_id" id="type" class="form-select my-3" aria-label="Default select example">
            <option value="" selected>Seleziona il tipo...</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>{{ $type->name }}
                </option>
            @endforeach
        </select>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                In progress
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Done
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-warning">Annulla</button>
    </form>
@endsection
