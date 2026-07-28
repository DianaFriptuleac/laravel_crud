@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="h4 mb-0">{{ $course->title }}</h1>
    </div>

    <div class="card-body">
        <p>
            <strong>Descrizione:</strong><br>
            {{ $course->description }}
        </p>

        <p>
            <strong>Durata:</strong>
            {{ $course->hours }} ore
        </p>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
            Torna ai corsi
        </a>

        <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">
            Modifica
        </a>
    </div>
</div>

@endsection