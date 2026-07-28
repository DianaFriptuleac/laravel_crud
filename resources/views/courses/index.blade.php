@extends('layouts.app')

@section('title', 'Elenco corsi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Elenco corsi</h1>

    <a href="{{ route('courses.create') }}" class="btn btn-success">
        Nuovo corso
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($courses->isEmpty())

    <div class="alert alert-warning">
        Nessun corso presente.
    </div>

@else

<table class="table table-bordered table-hover">
    <thead class="table-info">
        <tr>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Ore</th>
            <th>Azioni</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->hours }}</td>

                <td>
                    <a
                        href="{{ route('courses.show', $course) }}"
                        class="btn btn-info btn-sm"
                    >
                        Visualizza
                    </a>

                    <a
                        href="{{ route('courses.edit', $course) }}"
                        class="btn btn-secondary btn-sm"
                    >
                        Modifica
                    </a>

                    <form
                        action="{{ route('courses.destroy', $course) }}"
                        method="POST"
                        class="d-inline"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Elimina
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

@endif

@endsection