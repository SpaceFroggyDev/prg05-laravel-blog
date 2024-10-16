<x-layout title="Create">
    <form action="{{ route('articles.store') }}" method="post">
        @csrf
        <div>
{{--            <label for="title">Title</label>--}}
{{--            <input type="text" id="title" name="title"/>--}}
            <x-input-label title="title" class="form-label">Title</x-input-label>
            <x-text-input id="title" name="title" class="form-control"></x-text-input>
        </div>
        <div>
            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div>
            <x-input-label title="image" class="form-label">Image</x-input-label>
            <x-text-input id="image" name="image" class="form-control"></x-text-input>
        </div>
        <div>
            <x-input-label title="category" class="form-label">Category</x-input-label>
            <x-text-input id="category" name="category" class="form-control"></x-text-input>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</x-layout>
