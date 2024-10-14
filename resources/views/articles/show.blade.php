<x-layout title="{{$article->title}}">
    <h3>{{$article->title}}</h3>

    <form action="{{ route('articles.destroy', $article) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete"/>
    </form>

    <form>

    </form>
</x-layout>
