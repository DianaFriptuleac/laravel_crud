<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
    // una categoria può avere molti articoli
    public function articles(): HasMany
    {
        return $this->hasMany(Articles::class);
    }
}
