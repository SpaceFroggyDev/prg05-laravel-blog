<x-layout title="Create">
    <h1>New Post</h1>
    <form action="{{ route('articles.store') }}" method="post">
        @csrf
        <div>
{{--            <label for="title">Title</label>--}}
{{--            <input type="text" id="title" name="title"/>--}}
            <x-input-label title="title" class="form-label">Title</x-input-label>
            <x-text-input id="title" name="title" class="form-control" value="{{ old('title') }}"></x-text-input>
            @error('title')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" cols="30" rows="15" class="form-control" value="{{ old('text') }}"></textarea>
            @error('text')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-input-label title="image" class="form-label">Image URL</x-input-label>
            <x-text-input id="image" name="image" class="form-control" value="{{ old('image') }}"></x-text-input>
        </div>
        <div>
            <x-input-label title="category" class="form-label">Category</x-input-label>
            <x-text-input id="category" name="category" class="form-control" value="{{ old('category') }}"></x-text-input>
            @error('category')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
</x-layout>
