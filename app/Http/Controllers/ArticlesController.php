<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //Mostra elenco articoli
    public function index()
    {
        // Recupera tutti gli articoli ordinati dal più recente e carica anche categoria e tag
        $articles = Articles::with(['category', 'tags'])
        ->latest()->get();

        return view('articles.index', compact('articles'));
    }
}
