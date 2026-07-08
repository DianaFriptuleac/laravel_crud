@extends('layouts.app')

@section('content')

<h1 class="h3 mb-3">Modifica nota</h1>

<form action="{{ route('notes.update', $note) }}" method="POST" class="card card-body shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $note->title) }}"
        >
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Contenuto</label>
        <textarea
            name="content"
            rows="5"
            class="form-control @error('content') is-invalid @enderror"
        >{{ old('content', $note->content) }}</textarea>

        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-primary">Aggiorna</button>
    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annulla</a>

</form>

@endsection