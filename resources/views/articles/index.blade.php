<x-layout title="Articles">

    <form action="{{ route('articles.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search Articles...">
        <button type="submit" class="button">Search</button>
    </form>

    <h1>Articles</h1>
    <section id="articles">
        @foreach($articles as $article)
            <article>
                <h3>{{$article->title}}</h3>
                <div>
                    <p class="author">Written by {{ $article->user->name }} at {{ $article->created_at->toDateString() }}</p>
                    <span class="category">{{ $article->category->name }}</span>
                </div>
                <a href="{{ route('articles.show', $article->id) }}" class="button">Details</a>
            </article>
        @endforeach
    </section>
</x-layout>
