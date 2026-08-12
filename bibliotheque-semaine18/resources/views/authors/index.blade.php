<h1>Auteurs</h1>

@can('create', App\Models\Author::class)
    <a href="{{route('authors.create')}}">Ajouter un auteur</a>
@endcan

<table>
    @foreach($authors as $author)
    <tr>
        <td>{{$author->first_name}}</td>
        <td>{{$author->last_name}}</td>
        <td>{{$author->email}}</td>
        <td>{{$author->phone}}</td>

        @can('update', $author)
            <td>
                <a href="{{route('authors.edit', $author)}}">Modifier</a>
            </td>
        @else
            <td></td>
        @endcan

        @can('delete', $author)
            <td>
                <form action="{{route('authors.destroy', $author)}}" method="POST">
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