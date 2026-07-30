<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tags extends Model
{
   protected $fillable = [
    'name',
    'slug',
   ];

    // un tag può essere associato a più articoli tramite la tab. ponte article_tag
   public function articles(): BelongsToMany
   {
    return $this->belongsToMany(
        Articles::class,
        'article_tag',
        'tag_id',
        'article_id');
   }
}
