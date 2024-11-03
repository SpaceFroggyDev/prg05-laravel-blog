<x-layout title="Admin dashboard">
    <h1>Manage Articles</h1>
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>User</td>
            <td>Created at</td>
            <td>State</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->created_at->toDateString() }}</td>
                    <td>
                        <form action="{{ route('admin.toggle', $article->id) }}" method="post">
                            @csrf
                            <button type="submit" id="published" class="button">
                                @if($article->published)
                                    Published
                                @else
                                    Not Published
                                @endif
                            </button>
                        </form>
                    </td>
                    <td>
                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Delete</button>
                            </form>
{{--                            <a href="{{ route('articles.edit', $article->id) }}" class="button">Edit</a>--}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
