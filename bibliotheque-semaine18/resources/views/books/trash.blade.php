<h1>Corbeille des livres</h1>

<a href="{{ route('books.index') }}">
    Retour aux livres
</a>

<br><br>

<table>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>

        <td>
            {{ $book->author->first_name }}
            {{ $book->author->last_name }}
        </td>

        <td>
            <form action="{{ route('books.restore', $book->id) }}" method="POST">
                @csrf

                <button type="submit">
                    Restaurer
                </button>
            </form>
        </td>

        <td>
            @can('delete', $book)
                <form action="{{ route('books.forceDelete', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Supprimer définitivement
                    </button>
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
</table>

<br>

{{ $books->links() }}