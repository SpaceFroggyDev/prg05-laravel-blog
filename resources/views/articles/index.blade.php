<x-layout title="Articles">

    <section id="searchfilter">
        <form action="{{ route('articles.index') }}" method="GET" id="filter">
            @foreach($categories as $category)
                <input type="checkbox" name="filter[]" value="{{$category->id}}">
                <label for="filter[]">{{ $category->name }}</label>
            @endforeach
            <button type="submit" class="button">Filter</button>
        </form>

        <form action="{{ route('articles.index') }}" method="GET" id="search">
            <input class="searchbar" type="text" name="search" placeholder="Search Articles...">
            <button type="submit" class="button">Search</button>
        </form>
    </section>

    <h1>Articles</h1>
    <section id="articles">
        @foreach($articles as $article)
            <article>
                <h3>{{$article->title}}</h3>
                <p>{{Str::limit($article->text, 150, $end='...')}}</p>
                <div>
                    <p class="author">Written by {{ $article->user->name }} at {{ $article->created_at->toDateString() }}</p>
                    <span class="category">{{ $article->category->name }}</span>
                </div>
                <a href="{{ route('articles.show', $article->id) }}" class="button">Read more</a>
            </article>
        @endforeach
    </section>
</x-layout>
