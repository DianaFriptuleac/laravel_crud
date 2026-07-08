@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h3">{{ $note->title }}</h1>

        <p class="mt-3">{{ $note->content }}</p>

        <a href="{{ route('notes.index') }}" class="btn btn-secondary">
            Torna indietro
        </a>

        <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary">
            Modifica
        </a>
    </div>
</div>

@endsection