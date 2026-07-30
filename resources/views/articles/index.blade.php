<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Articoli</title>
</head>
<body>

<h1>Elenco articoli</h1>

@foreach($articles as $article)

    <h2>{{ $article->title }}</h2>

    <p>Categoria: {{ $article->category->name }}</p>

    <p>Tag:
        @foreach($article->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </p>

    <hr>

@endforeach

</body>
</html>