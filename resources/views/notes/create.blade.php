@extends('layouts.app')

@section('content')
<div class="conatiner">


    <div class="row justify-content-centet">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-item-center mb-4">
                <div>
                    <h2 class="text-dark-emphasis m-0 mb-1">Crea Nota</h2>
                    <p class="text-muted">Aggiungi una nuova nota alla tua raccolta</p>
                </div>
            </div>


            <div class="card">

                <div class="card-body p-4">

                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control"
                            placeholder="Inserisci un titolo descrittivo" autofocus>
                    </div>

                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info">Crea</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection