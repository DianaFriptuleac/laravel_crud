<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recupera categorie già create dal CategorySeeder
        $cucina = Category::where('slug', 'cucina')->firstOrFail();
        $fashion = Category::where('slug', 'fashion')->firstOrFail();
        $giardinaggio = Category::where('slug', 'giardinaggio')->firstOrFail();

        // Recupera i tag già creati dal TagsSeeder
        $facile = Tags::where('slug', 'facile')->firstOrFail();
        $estate = Tags::where('slug', 'estate')->firstOrFail();
        $tutorial = Tags::where('slug', 'tutorial')->firstOrFail();
        $consigli = Tags::where('slug', 'consigli')->firstOrFail();

        // Crea articolo
        $pasta = Articles::create([
            'category_id' => $cucina->id,
            'title' => 'Pasta al pesto fatta in casa',
            'slug' => 'pasta-al-pesto',
            'content' => 'Scopri come preparare un pesto fresco con pochi ingredienti.',
            'is_published' => true,
        ]);
        // Collega l'articolo ai tag
        $pasta->tags()->sync([
            $facile->id,
            $tutorial->id,
        ]);

        $torta = Articles::create([
            'category_id' => $cucina->id,
            'title' => 'Torta al cioccolato soffice',
            'slug' => 'torta-cioccolato',
            'content' => 'Una ricetta semplice per una torta morbida e golosa.',
            'is_published' => true,
        ]);
        $torta->tags()->sync([
            $facile->id,
        ]);

        $colori = Articles::create([
            'category_id' => $fashion->id,
            'title' => 'I colori di tendenza del 2026',
            'slug' => 'colori-tendenza-2026',
            'content' => 'Scopri quali sono i colori più utilizzati nella moda di quest\'anno.',
            'is_published' => true,
        ]);
        $colori->tags()->sync([
            $estate->id,
            $consigli->id,
        ]);

        $giacca = Articles::create([
            'category_id' => $fashion->id,
            'title' => 'Come abbinare una giacca di jeans',
            'slug' => 'giacca-jeans',
            'content' => 'Idee e consigli per creare outfit casual e moderni.',
            'is_published' => false,
        ]);
        $giacca->tags()->sync([
            $tutorial->id,
            $consigli->id,
        ]);

        $basilico = Articles::create([
            'category_id' => $giardinaggio->id,
            'title' => 'Come coltivare il basilico',
            'slug' => 'coltivare-basilico',
            'content' => 'Guida pratica per coltivare il basilico in vaso o in giardino.',
            'is_published' => true,
        ]);
        $basilico->tags()->sync([
            $facile->id,
            $consigli->id,
        ]);
    }
}
