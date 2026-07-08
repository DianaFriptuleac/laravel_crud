<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Recupera tutte le note ordinate dalla più recente alla meno recente
        // e le divide in pagine da 10 risultati
        $notes = Note::latest()->paginate(10);

         // Restituisce la vista notes.index
        // passando la variabile $note alla vista.
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource (form nuova nota)
     */
    public function create()
    {
         // Apre la pagina con il form di creazione.
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage (una nuova nota nel database)
     */
    public function store(Request $request)
    {
        // Controlla che i dati inviati rispettino queste regole
        $request->validate([
             // Il titolo è obbligatorio e può avere massimo 255 caratteri
            'title' => 'required|max:255',
            // Il contenuto è obbligatorio
            'content' => 'required'
        ]);

          // Crea una nuova nota utilizzando tutti i dati ricevuti dal form
        Note::create($request->all());

         // Reindirizza alla pagina dell'elenco delle note
        // e salva un messaggio di successo nella sessione
        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource (singola nota).
     */
    public function show(Note $note)
    {
        // Laravel recupera automaticamente la nota tramite il suo ID
        // e la passa alla vista.
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource (modificare una nota).
     */
    public function edit(Note $note)
    {
        // Passa la nota alla vista di modifica
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage (aggiorna nota essistente).
     */
    public function update(Request $request, Note $note)
    {
           // Controlla che i dati inviati siano validi
        $request->validate([
            // Titolo obbligatorio con massimo 255 caratteri
            'title' => 'required|max:255',
            // Contenuto obbligatorio
            'content' => 'required'
        ]);

         // Aggiorna la nota con i nuovi dati del form
        $note->update($request->all());

        // Torna alla lista delle note
        // mostrando un messaggio di conferma
        return redirect()->route('notes.index')
            ->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage (elimina nota dal db)
     */
    public function destroy(Note $note)
    {
        // Elimina la nota dal database
        $note->delete();

          // Torna alla lista delle note
        // mostrando un messaggio di conferma
        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}