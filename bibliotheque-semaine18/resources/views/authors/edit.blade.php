<h1>Modifier un auteur</h1>

<form action="{{route('authors.update', $author)}}" method="POST">
@csrf
@method('PUT')

<label for="last_name">Nom</label>
<input type="text" name="last_name" id="last_name" value="{{$author->last_name}}">
@error('last_name')
<div>{{$message}}</div>
@enderror

<label for="first_name">Prénom</label>
<input type="text" name="first_name" id="first_name" value="{{$author->first_name}}">
@error('first_name')
<div>{{$message}}</div>
@enderror

<label for="email">Email</label>
<input type="email" name="email" id="email" value="{{$author->email}}">
@error('email')
<div>{{$message}}</div>
@enderror

<label for="phone">Téléphone</label>
<input type="text" name="phone" id="phone" value="{{$author->phone}}">
@error('phone')
<div>{{$message}}</div>
@enderror

<button type="submit">Modifier</button>
</form>