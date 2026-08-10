<h1>Livres</h1>

<a href="{{route('books.create')}}">Ajouter un livre</a>

<table>
    @foreach($books as $book)
    <tr>
        <td>{{$book->title}}</td>
        <td>{{$book->author->first_name}} {{$book->author->last_name}}</td>

        <td>
            <a href="{{route('books.edit', $book)}}">Modifier</a>
        </td>

        <td>
            <form action="{{route('books.destroy', $book)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>