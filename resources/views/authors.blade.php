<x-layout>
    @isset($authors)
        @if (count($authors))
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($authors as $author)
                    <tr>
                        <td class="text-lg">{{ $author->first_name }}</td>
                        <td class="text-lg">{{ $author->last_name }}</td>
                        <td><a class="font-semibold" href="{{ url('/authors' . '/' . $author->id) }}">View</a></td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="font-semibold text-lg text-yellow">Authors List is empty <br /> You can use command from root project
                in terminal <br /> <code class="text-gray-200">php
                    artisan create:author</code> <br />which will create 2 authors by default <br />
                Or you can go with <br /><code class="text-gray-200">php
                    artisan create:author 10</code><br /> if you want 10 authors to be created</p>
        @endif
    @endisset
    @isset($authorWithBooks)
        <div>
            <p class="font-semibold text-lg py-2">{{ $authorWithBooks->first_name }} {{ $authorWithBooks->last_name }}
            </p>
            @if (count($authorWithBooks->books))
                <table>
                    <tr>
                        <th>Book</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($authorWithBooks->books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>
                                <form action="{{ url('/books' . '/' . $book->id . '/delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="font-semibold text-error" type="submit">Delete Book</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <td>
                    <form action="{{ url('/authors' . '/' . $authorWithBooks->id . '/delete') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="font-semibold text-error" type="submit">Delete User</button>
                    </form>
                </td>
            @endif
        </div>
    @endisset
</x-layout>
