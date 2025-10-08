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
    <link rel="stylesheet" href="./formetudiant.css">
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

                <a href="index.php?page=filiere" class="menu-item">
                    <i class="fas fa-calendar"></i>
                    <span>Filière</span>
                </a>
                <a href="index.php?page=niveau" class="menu-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Niveau</span>
                </a>
                <a href="index.php?page=listclasse">
                    <div class="menu-item">
                        <i class="fas fa-comment"></i>
                        <span>Classe</span>
                    </div>
                </a>
                <a href="index.php?page=listetudiant" class="menu-item">
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

                    <div class="Gcontainer">
                        <!-- Formulaire Classe adapté au dashboard -->
                        <div class="card-form">
                            <h2>Ajouter un Étudiant</h2>
                            <form class="grid-form" action="index.php?page=etudiant" method="post">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" name="nom" placeholder="Nom">
                                    <p class="error"><?= $errorNomEtudiant ?? "" ?></p>

                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" placeholder="prenom">
                                    <p class="error"><?= $errorPrenomEtudiant ?? "" ?></p>

                                </div>

                                <div class="form-group">
                                    <label for="tel">Téléphone</label>
                                    <input type="tel" id="tel" name="telephone" placeholder="tel">
                                    <p class="error"><?= $errorTelephoneEtudiant ?? "" ?></p>

                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="mail">
                                    <p class="error"><?= $errorEmailEtudiant ?? "" ?></p>

                                </div>

                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" id="adresse" name="adresse" placeholder="adresse">
                                    <p class="error"><?= $errorAdresseEtudiant ?? "" ?></p>

                                </div>

                                <div class="form-group">
                                    <label for="classe">Classe</label>
                                    <select id="classe" name="classe">
                                        <option value="">-- Choisir une classe --</option>
                                        <?php foreach ($classes as $classe): ?>
                                            <option value="<?= $classe['id'] ?>">
                                                <?= ($classe['libelle']) ?>
                                            </option>
                                           

                                        <?php endforeach; ?>
                                    </select>
                                     <p class="error"><?=  $errorClasseEtudiant ?? "" ?></p>
                                </div>

                                <!-- Bouton en pleine largeur -->
                                <div class="form-group full-width">
                                    <button type="submit" name="ajoutetudiant">Ajouter Étudiant</button>
                                </div>

                            </form>
                        </div>




                    </div>


































                </div>


            </div>


        </div>

    </div>
</body>

</html>