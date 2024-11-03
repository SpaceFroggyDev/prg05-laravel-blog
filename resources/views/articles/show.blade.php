<x-layout title="{{$article->title}}">
    <section id="details">
            <h3>{{$article->title}}</h3>
        <div>
            <p class="author">Written by {{ $article->user->name }}</p>
            <span class="category">{{ $article->category->name }}</span>
        </div>
        @isset($article->image)
            <img src="{{$article->image}}" alt="article image">
        @endisset
        <p>{{$article->text}}</p>
    </section>

    <section id="comments">
        @foreach($article->comments as $comment)
            <div>
                <p class="author">{{ $comment->user->name }}</p>
                <p>{{$comment->comment}}</p>
            </div>
        @endforeach
    </section>

    @isset(auth()->user()->is_admin)
        @if ($article->user->is(auth()->user()) or auth()->user()->is_admin)
            <div class="article-actions">
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="button"/>
                </form>
                <a href="{{ route('articles.edit', $article->id) }}" class="button">Edit</a>
            </div>
        @endif
    @endisset

    <form action="{{ route('comments.store', $article->id) }}" method="post">
        @csrf
        <div>
            <label for="text" class="form-label">Comment</label>
            <textarea id="comment" name="comment" cols="15" rows="5" class="form-control" placeholder="Share your thoughts..."></textarea>
        </div>
        <div>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
</x-layout>
