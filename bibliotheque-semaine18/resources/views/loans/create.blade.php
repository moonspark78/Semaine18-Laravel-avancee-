<h1>Nouvel emprunt</h1>

<form action="{{ route('loans.store') }}" method="POST">
    @csrf

    <label>Utilisateur</label>

    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">
                {{ $user->name }}
            </option>
        @endforeach
    </select>

    <label>Livre</label>

    <select name="book_id">
        @foreach($books as $book)
            <option value="{{ $book->id }}">
                {{ $book->title }}
            </option>
        @endforeach
    </select>

    <button type="submit">Emprunter</button>
</form>