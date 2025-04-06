<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue</title>
</head>

<body>
  <h1>Bonjour, {{ $user->prenom }} {{ $user->nom }}</h1>
  <p>Votre compte a été crée avec succès !</p>
  <p>Voici vos identifiants :</p>

  <ul>
    <li>Email : <strong> {{ $user->email }}</strong></li>
    <li>Mot de passe : <strong> {{ $password }}</strong></li>
  </ul>
</body>

</html>