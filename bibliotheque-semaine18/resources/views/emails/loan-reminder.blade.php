<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rappel d'emprunt</title>
</head>

<body>

    <h1>Rappel concernant votre emprunt</h1>

    <p>
        Bonjour {{ $loan->user->name }},
    </p>

    <p>
        Nous vous rappelons que vous avez actuellement emprunté le livre :
    </p>

    <p>
        <strong>{{ $loan->book->title }}</strong>
    </p>

    <p>
        Merci de bien vouloir rapporter cet ouvrage à la bibliothèque
        dans les meilleurs délais.
    </p>

    <p>
        Merci,
    </p>

    <p>
        La bibliothèque
    </p>

</body>
</html>