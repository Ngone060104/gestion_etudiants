<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Étudiant</title>
  <link rel="stylesheet" href="cc.css">
  <style>

  </style>
</head>

<body>
  <div class="container">

    <!-- Bloc gauche (promo) -->
    <div class="promo">
      <h2>Bienvenue sur l'espace étudiant</h2>
      <p>Connectez-vous pour accéder à vos cours et ressources.</p>
      <ul>
        <li>Design sobre et professionnel
          HTML/CSS + PHP uniquement</li>
      </ul>
    </div>

    <!-- Bloc droit (formulaire) -->
    <div class="card">
      <h2>Connexion</h2>
      <form action="" method="post" class="formconnexion">
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" placeholder="Entrez votre email" value="<?=$user["email"]    ??""     ?>">
          <p class="error"> <?= $errorEmail ?? "" ?></p>
          <p></p>
        </div>

        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" value="<?=$user["password"] ?? ""?>">
          <p class="error"> <?= $errorPassword ?? "" ?></p>
        </div>

        <button type="submit" class="btn" name="connect">Se connecter</button>
        <p class="error"> <?= $errorLogin ?? "" ?></p>
      </form>
    </div>
  </div>
</body>

</html>