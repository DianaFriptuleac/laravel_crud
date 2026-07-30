<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Articles extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'is_published',
    ];

     // Converte campo is_published in boolean
    protected $casts = [
        'is_published' => 'boolean',
    ];

    // ogni articolo appartiene ad una sola categoria
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // un articolo può avere più tag e un tag può appartenere a più articoli tramite la tab. ponte article_tag
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
              Tags::class,
              'article_tag',
              'article_id',
              'tag_id'
        );
    }
}
