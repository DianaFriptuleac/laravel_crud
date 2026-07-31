@extends('layouts.app')

@section('title', 'Modifica articolo')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark-emphasis m-0 mb-1">Modifica Articolo</h2>
                <p class="text-muted">
                    Aggiorna i dati dell'articolo
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">

                <form
                    action="{{ route('articles.update', $article) }}"
                    method="POST">

                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo</label>

                        <input
                            id="title"
                            name="title"
                            type="text"
                            class="form-control"
                            value="{{ old('title', $article->title) }}">

                        @error('title')
                        <p class="errore">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="form-label">Categoria</label>

                        <select
                            id="category_id"
                            name="category_id"
                            class="form-select">

                            <option value="">Seleziona una categoria</option>

                            @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                @selected(
                                old('category_id', $article->category_id) == $category->id
                                )
                                >
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="form-label">Contenuto</label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control"
                            rows="6">{{ old('content', $article->content) }}</textarea>

                        @error('content')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @php
                    $selectedTags = old(
                    'tags',
                    $article->tags->pluck('id')->toArray()
                    );
                    @endphp

                    <div class="mb-4">
                        <label class="form-label d-block">Tag</label>

                        @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="tag-{{ $tag->id }}"
                                name="tags[]"
                                value="{{ $tag->id }}"
                                @checked(in_array($tag->id, $selectedTags))
                            >

                            <label
                                class="form-check-label"
                                for="tag-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                    @error('tags')
                    <p class="errore">{{ $message }}</p>
                    @enderror

                    @error('tags.*')
                    <p class="errore">{{ $message }}</p>
                    @enderror
                    <div class="form-check mb-4">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="is_published"
                            name="is_published"
                            value="1"
                            @checked(old('is_published', $article->is_published))
                        >

                        <label class="form-check-label" for="is_published">
                            Pubblicato
                        </label>
                    </div>
                    <button type="submit" class="btn btn-info">
                        Aggiorna articolo
                    </button>

                    <a
                        href="{{ route('articles.index') }}"
                        class="btn btn-outline-secondary ms-2">
                        Annulla
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection