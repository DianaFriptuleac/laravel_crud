@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Lista note</h1>
    <a href="{{ route('notes.create') }}" class="btn btn-primary">Nuova nota</a>
</div>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Contenuto</th>
                    <th class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes as $note)
                <tr>
                    <td>{{ $note->title }}</td>
                    <td>{{ Str::limit($note->content, 80) }}</td>
                    <td class="text-end">
                        <a href="{{ route('notes.show', $note) }}" class="btn btn-sm btn-outline-secondary">Apri</a>
                        <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-outline-primary">Modifica</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminare questa nota?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Nessuna nota trovata.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $notes->links() }}
    </div>
</div>
@endsection