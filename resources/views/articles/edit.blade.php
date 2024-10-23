<x-layout title="Create">

    <h1>Edit Post</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="post">
        @csrf
        @method('patch')
        <div>
            <x-input-label title="title" class="form-label">Title</x-input-label>
            <x-text-input id="title" name="title" class="form-control" value="{{ old('title', $article->title) }}"></x-text-input>
            @error('title')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" cols="30" rows="15" class="form-control" value="{{ old('text', $article->text) }}" placeholder="Share your interesting cosplay and craft story or advice in here!">{{ old('text', $article->text) }}</textarea>
            @error('text')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label title="image" class="form-label">Image URL</x-input-label>
            <x-text-input id="image" name="image" class="form-control" value="{{ old('image', $article->image) }}" placeholder="Paste your image link here (optional)"></x-text-input>
        </div>
        <div>
            <x-input-label title="category_id" class="form-label">Category</x-input-label>
            <select id="category_id" name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
</x-layout>
