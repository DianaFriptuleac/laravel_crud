@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="h4 mb-0">Modifica corso</h1>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="{{ old('title', $course->title) }}"
                >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">
                    Descrizione
                </label>

                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    rows="4"
                >{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="hours" class="form-label">Ore</label>

                <input
                    type="number"
                    name="hours"
                    id="hours"
                    class="form-control"
                    value="{{ old('hours', $course->hours) }}"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Aggiorna corso
            </button>

            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                Annulla
            </a>
        </form>

    </div>
</div>

@endsection