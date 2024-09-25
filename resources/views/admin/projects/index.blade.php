@extends('layouts.app')

@section('content')
    <h3>Lista {{ $projectCount }} progetti </h3>
    <table class="table">
        <tdead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Data di creazione</th>
                <th scope="col">Status</th>
                <th scope="col">Type</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->created_at->format('d-m-Y') }}</td>
                        <td>{{ $project->status ? 'Done' : 'In progress' }}</td>
                        <td>
                            {{-- stampo in pagina il tipo --}}
                            {{ $project->type ? $project->type->name : 'nessuna categoria' }}
                        </td>
                        <td class="d-flex gap-2">
                            <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form class="d-inline" onsubmit="return confirm('Sicuro di voler eliminare?')"
                                action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
@endsection
