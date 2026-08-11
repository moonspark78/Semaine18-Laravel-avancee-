<h1>Connexion</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label>
    <input type="email" name="email">

    <label>Mot de passe</label>
    <input type="password" name="password">

    <button type="submit">Se connecter</button>
</form>