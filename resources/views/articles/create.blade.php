<x-layout title="Create">
    <form action="{{ route('articles.store') }}" method="post">
        @csrf
        <div>
{{--            <label for="title">Title</label>--}}
{{--            <input type="text" id="title" name="title"/>--}}
            <x-input-label title="title">Title</x-input-label>
            <x-text-input id="title" name="title"></x-text-input>
        </div>
        <div>
            <label for="text">Text</label>
            <textarea id="text" name="text" cols="30" rows="10"></textarea>
        </div>
        <div>
            <x-input-label title="image">Image</x-input-label>
            <x-text-input id="image" name="image"></x-text-input>
        </div>
        <div>
            <x-input-label title="category">Category</x-input-label>
            <x-text-input id="category" name="category"></x-text-input>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</x-layout>
