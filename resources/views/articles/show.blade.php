<x-layout title="{{$article->title}}">
    <h3>{{$article->title}}</h3>
{{--    <img src="{{$article->image}}" alt="article image">--}}
    <p>{{$article->text}}</p>

    <form action="{{ route('articles.destroy', $article) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-danger"/>
    </form>

    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <div>
            <label for="text" class="form-label">Comment</label>
            <textarea id="comment" name="comment" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</x-layout>
