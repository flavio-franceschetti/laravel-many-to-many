@extends('layouts.app')


@section('content')
    @extends('layouts.app')

@section('content')
    <h3>Modifica il progetto</h3>
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ $project->description }}">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="github" class="form-label">Github</label>
            <input type="text" class="form-control" id="github" name="github" value="{{ $project->github }}">
            @error('github')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

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


@endsection
