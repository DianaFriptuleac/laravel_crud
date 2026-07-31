@extends('layouts.app')

@section('title', 'Elenco articoli')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="text-dark-emphasis mb-1">Elenco articoli</h2>
        <p class="text-muted mb-0">
            Gestisci tutti gli articoli del blog
        </p>
    </div>

    <a href="{{ route('articles.create') }}" class="btn btn-info">
        <i class="bi bi-plus-circle me-1"></i>
        Nuovo articolo
    </a>
</div>

<div class="row g-4">

    @forelse ($articles as $article)

    <div class="col-md-6 col-lg-4">

        <div class="card h-100 fade-in">
            <div class="card-body p-4 d-flex flex-column">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h4 class="card-title mb-0">
                        {{ $article->title }}
                    </h4>

                    @if ($article->is_published)
                    <span class="badge bg-success">
                        Pubblicato
                    </span>
                    @else
                    <span class="badge bg-secondary">
                        Bozza
                    </span>
                    @endif
                </div>

                <p class="text-muted mb-2">
                    <i class="bi bi-folder me-1"></i>
                    {{ $article->category->name }}
                </p>

                <div class="mb-4">
                    @forelse ($article->tags as $tag)
                    <span class="badge bg-info text-dark me-1 mb-1">
                        {{ $tag->name }}
                    </span>
                    @empty
                    <span class="text-muted small">
                        Nessun tag
                    </span>
                    @endforelse
                </div>

                <div class="d-flex gap-2 mt-auto">

                    <a
                        class="btn btn-info btn-sm"
                        href="{{ route('articles.show', $article) }}">
                        <i class="bi bi-eye"></i>
                    </a>

                    <a
                        class="btn btn-warning btn-sm"
                        href="{{ route('articles.edit', $article) }}">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form
                        action="{{ route('articles.destroy', $article) }}"
                        method="POST"
                        onsubmit="return confirm('Eliminare questo articolo?')"
                        class="m-0 p-0 bg-transparent shadow-none">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" type="submit">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>

    @empty

    <div class="col-12">
        <div class="alert alert-info">
            Non sono presenti articoli.
        </div>
    </div>

    @endforelse

</div>

<div class="mt-4">
    {{ $articles->links() }}
</div>

@endsection