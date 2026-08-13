<h1>Emprunts</h1>

@if(session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('loans.create') }}">Nouvel emprunt</a>

<table>
    <tr>
        <th>Utilisateur</th>
        <th>Livre</th>
        <th>Date d'emprunt</th>
        <th>Statut</th>
        <th>Action</th>
    </tr>

    @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->user->name }}</td>

            <td>{{ $loan->book->title }}</td>

            <td>{{ $loan->borrowed_at }}</td>

            <td>
                @if($loan->returned_at == null)
                    En cours
                @else
                    Rendu le {{ $loan->returned_at }}
                @endif
            </td>

            <td>

                @if($loan->returned_at == null)

                    <form action="{{ route('loans.update', $loan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="submit">
                            Marquer comme rendu
                        </button>
                    </form>

                    <form action="{{ route('loans.remind', $loan) }}" method="POST">
                        @csrf

                        <button type="submit">
                            Relancer
                        </button>
                    </form>

                @endif

            </td>
        </tr>
    @endforeach
</table>