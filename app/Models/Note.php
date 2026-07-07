<?php

namespace App\Models;  //nome della cartella

use Illuminate\Database\Eloquent\Model;   // chiamata di un'altra classe

// Definisce il Model Note
// Questo Model rappresenta la tabella "notes" del database
class Note extends Model
{
    // Elenco degli attributi che possono essere assegnati in massa (Mass Assignment)
    // Quando utilizzo:
    // Note::create($request->all());
    // Laravel permetterà di salvare solo questi campi
    protected $fillable = [
         // Colonna "title" e "content" della tabella notes
        'title', 'content'
    ];
}
