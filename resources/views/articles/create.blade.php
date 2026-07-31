@extends('layouts.app')

@section('title', 'Nuovo articolo')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ci sono degli errori:</strong>

        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-dark-emphasis m-0 mb-1">Crea Articolo</h2>
                <p class="text-muted">
                    Aggiungi un nuovo articolo al blog
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('articles.store') }}" method="POST">

                    @csrf

                    <label for="title" class="mb-2">Titolo</label>

                    <input
                        id="title"
                        name="title"
                        type="text"
                        class="form-control"
                        placeholder="Inserisci il titolo dell'articolo"
                        value="{{ old('title') }}">

                    @error('title')
                    <p class="errore">{{ $message }}</p>
                    @enderror

                    <label for="category_id" class="mb-2">Categoria</label>

                    <select id="category_id" name="category_id" class="form-select">
                        <option value="">Seleziona una categoria</option>

                        @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id')==$category->id)
                            >
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <p class="errore">{{ $message }}</p>
                    @enderror

                    <label for="content" class="mb-2">Contenuto</label>

                    <textarea
                        id="content"
                        name="content"
                        class="form-control"
                        rows="6"
                        placeholder="Scrivi il contenuto dell'articolo">{{ old('content') }}</textarea>

                    @error('content')
                    <p class="errore">{{ $message }}</p>
                    @enderror

                    <div class="mb-4">
                        <label class="form-label" class="mb-2">Tag</label>

                        @foreach ($tags as $tag)
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="tags[]"
                                value="{{ $tag->id }}"
                                @checked(in_array($tag->id, old('tags', [])))
                            >

                            <label class="form-check-label">
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
                            name="is_published"
                            value="1"
                            @checked(old('is_published'))>

                        <label class="form-check-label"  class="mb-2">
                            Pubblicato
                        </label>
                    </div>

                    @error('is_published')
                    <p class="errore">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-info">
                        Salva articolo
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection