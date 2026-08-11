<h1>Ajouter un emprunt</h1>

<form action="{{route('loans.store')}}" method="POST">
@csrf

<label for="user_id">Utilisateur</label>

<select name="user_id" id="user_id">
    <option value="">Choisir un utilisateur</option>

    @foreach($users as $user)
        <option value="{{$user->id}}">
            {{$user->name}}
        </option>
    @endforeach
</select>

@error('user_id')
<div>{{$message}}</div>
@enderror


<label for="book_id">Livre</label>

<select name="book_id" id="book_id">
    <option value="">Choisir un livre</option>

    @foreach($books as $book)
        <option value="{{$book->id}}">
            {{$book->title}}
        </option>
    @endforeach
</select>

@error('book_id')
<div>{{$message}}</div>
@enderror


<button type="submit">Créer</button>

</form>