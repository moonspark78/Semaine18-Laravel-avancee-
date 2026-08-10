<h1>Ajouter un livre</h1>

<form action="{{route('books.store')}}" method="POST">
@csrf

<label for="title">Titre</label>
<input type="text" name="title" id="title" value="{{old('title')}}">

@error('title')
<div>{{$message}}</div>
@enderror

<label for="author_id">Auteur</label>

<select name="author_id" id="author_id">
    <option value="">Choisir un auteur</option>

    @foreach($authors as $author)
        <option value="{{$author->id}}">
            {{$author->first_name}} {{$author->last_name}}
        </option>
    @endforeach
</select>

@error('author_id')
<div>{{$message}}</div>
@enderror

<button type="submit">Créer</button>
</form>