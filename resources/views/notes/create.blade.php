@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="text-dark-emphasis m-0 mb-1">Crea Nota</h2>
                    <p class="text-muted">Aggiungi una nuova nota alla tua raccolta</p>
                </div>
            </div>


            <div class="card">

                <div class="card-body p-4">
                    <form action="{{ route('notes.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="form-label">Titolo</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control"
                                placeholder="Inserisci un titolo descrittivo"
                                value="{{ old('title') }}"
                                autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="form-label">Contenuto</label>
                            <textarea
                                name="content"
                                id="content"
                                class="form-control"
                                rows="5"
                                placeholder="Scrivi il contenuto della nota">{{ old('content') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-info">
                            Crea
                        </button>

                    </form>

            </div>
        </div>
    </div>
</div>
@endsection