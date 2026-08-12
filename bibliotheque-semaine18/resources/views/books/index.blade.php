<h1>Livres</h1>

@can('create', App\Models\Book::class)
    <a href="{{route('books.create')}}">Ajouter un livre</a>
@endcan

<table>
    @foreach($books as $book)
    <tr>
        <td>{{$book->title}}</td>
        <td>{{$book->author->first_name}} {{$book->author->last_name}}</td>

        @can('update', $book)
            <td>
                <a href="{{route('books.edit', $book)}}">Modifier</a>
            </td>
        @else
            <td></td>
        @endcan

        @can('delete', $book)
            <td>
                <form action="{{route('books.destroy', $book)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        @else
            <td></td>
        @endcan
    </tr>
    @endforeach
</table>