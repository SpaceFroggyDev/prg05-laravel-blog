<x-layout title="{{$article->title}}">
    <section id="details">
        <h3>{{$article->title}}</h3>
        @isset($article->image)
            <img src="{{$article->image}}" alt="article image">
        @endisset
        <p>{{$article->text}}</p>
    </section>

    <section id="comments">
        @isset($comment->comment)
            <span>There is supposed to be a comment here!</span>
            @endisset
    </section>

    <form action="{{ route('articles.destroy', $article) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="button"/>
    </form>

    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <div>
            <label for="text" class="form-label">Comment</label>
            <textarea id="comment" name="comment" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
</x-layout>
