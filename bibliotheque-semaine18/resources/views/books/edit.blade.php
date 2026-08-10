<h1>Modifier un livre</h1>

<form action="{{route('books.update', $book)}}" method="POST">
@csrf
@method('PUT')

<label for="title">Titre</label>
<input type="text" name="title" id="title" value="{{$book->title}}">

@error('title')
<div>{{$message}}</div>
@enderror

<label for="author_id">Auteur</label>

<select name="author_id" id="author_id">
    @foreach($authors as $author)
        <option value="{{$author->id}}" 
            {{$book->author_id == $author->id ? 'selected' : ''}}>
            {{$author->first_name}} {{$author->last_name}}
        </option>
    @endforeach
</select>

@error('author_id')
<div>{{$message}}</div>
@enderror

<button type="submit">Modifier</button>
</form>