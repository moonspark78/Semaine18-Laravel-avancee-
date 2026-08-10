<h1>Ajouter un auteur</h1>

<form action="{{route('authors.store')}}" method="POST">
@csrf

<label for="last_name">Nom</label>
<input type="text" name="last_name" id="last_name" value="{{old('last_name')}}">
@error('last_name')
<div>{{$message}}</div>
@enderror

<label for="first_name">Prénom</label>
<input type="text" name="first_name" id="first_name" value="{{old('first_name')}}">
@error('first_name')
<div>{{$message}}</div>
@enderror

<label for="email">Email</label>
<input type="email" name="email" id="email" value="{{old('email')}}">
@error('email')
<div>{{$message}}</div>
@enderror

<label for="phone">Téléphone</label>
<input type="text" name="phone" id="phone" value="{{old('phone')}}">
@error('phone')
<div>{{$message}}</div>
@enderror

<button type="submit">Créer</button>
</form>