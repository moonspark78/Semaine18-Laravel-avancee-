<h1>Auteurs</h1>

<a href="{{route('authors.create')}}">Ajouter un auteur</a>

<table>
    @foreach($authors as $author)
    <tr>
        <td>{{$author->first_name}}</td>
        <td>{{$author->last_name}}</td>
        <td>{{$author->email}}</td>
        <td>{{$author->phone}}</td>
        <td>
            <a href="{{route('authors.edit', $author)}}">Modifier</a>
        </td>
        <td>
            <form action="{{route('authors.destroy', $author)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>