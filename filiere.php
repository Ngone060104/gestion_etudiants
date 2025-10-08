<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./filiere.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
  <div class="Dash">

    <div class="P1">
      <!-- Logo en haut -->
      <div class="top">
        <img src="./Logo moderne de SocialTrack (1).png" alt="Logo SocialTrack" class="logo-img">
      </div>

      <!-- Menu principal centré verticalement -->
      <div class="menu">
        <a href="index.php?page=dashbord" class="menu-item">
          <i class="fa-solid fa-grip"></i>
          <span>Dashbord</span>
        </a>

        <a href="" class="menu-item">
          <i class="fas fa-calendar"></i>
          <span>Filière</span>
        </a>
        <a href="index.php?page=niveau" class="menu-item">
          <i class="fas fa-chart-line"></i>
          <span>Niveau</span>
        </a>
        <a href="index.php?page=classe">
          <div class="menu-item">
            <i class="fas fa-comment"></i>
            <span>Classe</span>
          </div>
        </a>
        <a href="index.php?page=etudiant" class="menu-item">
          <i class="fa-solid fa-users"></i>
          <span>Etudiant</span>
        </a>
      </div>

      <!-- Menu bas -->
      <div class="menu-bottom">
        <div class="menu-item">
          <i class="fas fa-cog"></i>
          <span>Paramètres</span>
        </div>
        <a href="<?= "WEBROOT" ?>?page=logout" class="menu-item">
          <i class="fas fa-sign-out-alt"></i>
          <span>Déconnexion</span>
        </a>
      </div>
    </div>



    <div class="P2">
      <input type="text"
        style="margin-top: 1%; margin-left: 05%; border: 1px solid ghostwhite; padding: 05px; border-radius: 50px; width: 30%;height: 15px;"
        placeholder="Search" class="recherche">
      <i class="fas fa-bell" id="bell"></i>
      <img src="https://picsum.photos/300/200" class="img2">
      <h4>Bienvenue</h4>
      <p class="sous_titre"><?= $_SESSION["userConnected"]["prenom"] ?? "" ?></p>
      <div style="  margin-top: 05%;">
        <div class="P3">
          <div class="card1">
            <h2>Ajout Filliere</h2>

            <form action="index.php?page=filiere" method="post">
              <div class="d1">
                <div class="input1">
                  <label for="">Libelle</label>
                  <input type="text" placeholder="libelle " name="libelle">
                  <!-- Message d'erreur -->
                  <p class="errorlibellefiliere"><?= $errorlibellefiliere ?? "" ?></p>
                </div>
                <div class="input1">
                  <button type="submit" class="bt1" name="ajoutfiliere">Ajouter</button>
                </div>
              </div>

            </form>
          </div>
          <div class="Gcontainer">
            <div class="cards-container">
                <?php foreach ($filieres as $filiere): ?>
              <div class="card">
                <img
                  src="https://picsum.photos/300/200"
                  alt="<?=($filiere['libelle']) ?>">
                <h3><?=($filiere['libelle']) ?></h3>
                <form action="index.php?page=filiere" method="post">
                <input type="hidden" name="delete_id" value="<?= $filiere['id'] ?>">
                 <!-- <a href="<?= WEBROOT ?>?page=dashbord&id=<?= $tache["id"] ?>&supprimer=true"><button name="supprimer">Supprimer</button></a> -->
                  <button class="delete" type="submit" name="delete"><i class="fa-solid fa-trash"></i></button>
                </form>
              </div>
               <?php endforeach; ?>

              

            
            </div>
          </div>


































        </div>


      </div>


    </div>

  </div>
</body>

</html>