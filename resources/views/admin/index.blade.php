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
            <td>#</td>
        </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->created_at->toDateString() }}</td>
                    <td>{{ $article->published }}</td>
                    <td>
                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="button"/>
                            </form>
                            <a href="{{ route('articles.edit', $article->id) }}" class="button">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
