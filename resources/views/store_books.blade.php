<x-layout>
    <div class="grid p-6">
        <h1>Add a new book</h1>
        <form action="{{ url('/books') }}" method="POST">
            @csrf
            @method('POST')
            <select name="author_id" id="author_id">
                @foreach ($authors as $author)
                    <option value='{{ $author->id }}'>{{ $author->first_name }} {{ $author->last_name }}</option>
                @endforeach
            </select>
            @error('author')
                <p class="text-error text-lg">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" placeholder="Title" name="title" />
            @error('title')
                <p class="text-error">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" placeholder="Description" name="description" />
            @error('description')
                <p class="text-error text-lg">
                    {{ $message }}
                </p>
            @enderror
            <input type="date" placeholder="Release_date" name="release_date" />
            @error('release_date')
                <p class="text-error text-lg">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" placeholder="Isbn" name="isbn" />
            @error('isbn')
                <p class="text-error text-lg">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" placeholder="Format" name="format" />
            @error('format')
                <p class="text-error text-lg">
                    {{ $message }}
                </p>
            @enderror
            <input type="number" placeholder="Number Of Pages" name="number_of_pages" />
            @error('number_of_pages')
                <p class="text-error text-lg">
                    {{ $message }}
                </p>
            @enderror

            <button class="block font-semibold text-error" type="submit">Add a Book</button>
        </form>
    </div>
</x-layout>
