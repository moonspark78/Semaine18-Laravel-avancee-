<h1>Livres</h1>

@can('create', App\Models\Book::class)
    <a href="{{ route('books.create') }}">Ajouter un livre</a>
    <br>
    <a href="{{ route('books.trash') }}">Voir la corbeille</a>
@endcan

<table>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>

        <td>
            {{ $book->author->first_name }}
            {{ $book->author->last_name }}
        </td>

        @can('update', $book)
            <td>
                <a href="{{ route('books.edit', $book) }}">
                    Modifier
                </a>
            </td>
        @else
            <td></td>
        @endcan

        @can('delete', $book)
            <td>
                <form action="{{ route('books.destroy', $book) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Supprimer
                    </button>
                </form>
            </td>
        @else
            <td></td>
        @endcan
    </tr>
    @endforeach
</table>

<br>

<div>
    Showing {{ $books->firstItem() }} to {{ $books->lastItem() }}
    of {{ $books->total() }} results
</div>

<br>

@if ($books->previousPageUrl())
    <a href="{{ $books->previousPageUrl() }}">&lt;</a>
@endif

&nbsp;

@if ($books->nextPageUrl())
    <a href="{{ $books->nextPageUrl() }}">&gt;</a>
@endif