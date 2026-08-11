<h1>Emprunts</h1>

<a href="{{route('loans.create')}}">Ajouter un emprunt</a>

<table>
    @foreach($loans as $loan)
    <tr>
        <td>{{$loan->user->name}}</td>
        <td>{{$loan->book->title}}</td>
        <td>{{$loan->borrowed_at}}</td>

        <td>
            @if($loan->returned_at == null)
                <span>En cours</span>

                <form action="{{route('loans.update', $loan)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Marquer comme rendu</button>
                </form>
            @else
                <span>Rendu le {{$loan->returned_at}}</span>
            @endif
        </td>
    </tr>
    @endforeach
</table>