<?php

namespace App\Models;  //nome della cartella

use Illuminate\Database\Eloquent\Model;   // chiamata di un'altra classe

class Note extends Model
{
    protected $fillable = [
        'title', 'content'
    ];
}
