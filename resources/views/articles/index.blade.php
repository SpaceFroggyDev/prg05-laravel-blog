<x-layout title="Articles">
    <h2>All articles</h2>
    <a href="{{ route('articles.create') }}">Add article</a>
    @foreach($articles as $article)
        <h3>{{$article->title}}</h3>
        <a href="{{ route('articles.show', $article->id) }}">Details</a>
    @endforeach
</x-layout>
