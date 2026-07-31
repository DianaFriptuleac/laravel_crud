@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card fade-in">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="text-dark-emphasis mb-1">
                            {{ $article->title }}
                        </h2>

                        <p class="text-muted mb-0">
                            Dettaglio dell'articolo
                        </p>
                    </div>

                    @if($article->is_published)
                        <span class="badge bg-success fs-6">
                            Pubblicato
                        </span>
                    @else
                        <span class="badge bg-secondary fs-6">
                            Non pubblicato
                        </span>
                    @endif
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Categoria</strong>

                    <div class="mt-2">
                        <span class="badge bg-info">
                            {{ $article->category->name }}
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <strong>Tag</strong>

                    <div class="mt-2">

                        @forelse ($article->tags as $tag)

                            <span class="badge bg-dark me-1">
                                {{ $tag->name }}
                            </span>

                        @empty

                            <span class="text-muted">
                                Nessun tag
                            </span>

                        @endforelse

                    </div>
                </div>

                <div class="mb-4">
                    <strong>Contenuto</strong>

                    <p class="mt-2 text-muted">
                        {{ $article->content }}
                    </p>
                </div>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('articles.edit', $article) }}"
                        class="btn btn-warning"
                    >
                        <i class="bi bi-pencil-square"></i>
                        Modifica
                    </a>

                    <a
                        href="{{ route('articles.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Torna all'elenco
                    </a>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection