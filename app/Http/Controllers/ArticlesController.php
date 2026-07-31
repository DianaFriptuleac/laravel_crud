<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    //Mostra elenco articoli
    public function index()
    {
        // Recupera tutti gli articoli ordinati dal più recente e carica anche categoria e tag
        $articles = Articles::with(['category', 'tags'])
            ->latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tags::orderBy('name')->get();

        return view(
            'articles.create',
            compact('categories', 'tags')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string', 'min:20'],
            'is_published' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id']
        ]);
        $tagsId = $validated['tags'] ?? [];  // salva temporaneamente gli id dei tag
        unset($validated['tags']);   // rimuove tags xke non e una col. della tabella articles
        $validated['slug'] = Str::slug($validated['title']);    //genera slug partendo dal title
        $validated['is_published'] = $request->boolean('is_published');   // converte checkbox in true o false
        $article = Articles::create($validated);

        $article->tags()->sync($tagsId);    // colega i tag nella tabella ponte article_tag

        return redirect()->route('articles.index')->with('success', 'Articolo creato correttamente');
    }

    // show singolo articolo
    public function show(Articles $article)
    {
        $article->load(['category', 'tags']);   // carica categorie e tag dell'articolo
        return view('articles.show', compact('article'));
    }

    //form per modificare un articolo
    public function edit(Articles $article)
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tags::orderBy('name')->get();
        $article->load('tags');   // carica tag gia collegati all'articolo
        return view(
            'articles.edit',
            compact('article', 'categories', 'tags')
        );
    }

    public function update(Request $request, Articles $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string', 'min:20'],
            'is_published' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id']
        ]);

        $tagsId = $validated['tags'] ?? [];
        unset($validated['tags']);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');

        $article->update($validated);

        $article->tags()->sync($tagsId);

        return redirect()->route('articles.index')->with('success', 'Articolo aggiornato correttamente');
    }

    public function destroy(Articles $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Articolo eliminato correttamente');
    }
}
