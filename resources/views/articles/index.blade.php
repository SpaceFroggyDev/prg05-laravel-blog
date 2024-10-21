<x-layout title="Articles">
    <h1>Articles</h1>
    <section id="articles">
        @foreach($articles as $article)
            <article>
                <h3>{{$article->title}}</h3>
                <a href="{{ route('articles.show', $article->id) }}" class="button">Details</a>
            </article>
        @endforeach
    </section>
</x-layout>
