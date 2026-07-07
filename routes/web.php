<?php
// che gestirà tutte le operazioni sulle note
use App\Http\Controllers\NoteController;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

// Definisce una rotta GET per l'URL principale "/"
Route::get('/', function () {

     // Reindirizza automaticamente alla rotta chiamata "notes.index"
    // Equivale ad andare su /notes
      return redirect()->route('notes.index');
});


// Crea automaticamente tutte le rotte CRUD per il controller NoteController.
//
// GET       /notes              -> index()
// GET       /notes/create       -> create()
// POST      /notes              -> store()
// GET       /notes/{note}       -> show()
// GET       /notes/{note}/edit  -> edit()
// PUT/PATCH /notes/{note}       -> update()
// DELETE    /notes/{note}       -> destroy()
Route::resource('notes', NoteController::class);
