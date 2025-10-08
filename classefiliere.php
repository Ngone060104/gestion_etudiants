<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// var_dump($classes); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./listclasse.css">
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
                <a href="index.php?page=filiere" class="menu-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Niveau</span>
                </a>
                <div class="menu-item">
                    <i class="fas fa-comment"></i>
                    <span>Classe</span>
                </div>
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

                    <div class="Gcontainer">
                        <!-- <?php var_dump($classes) ?> -->
                        <!-- Formulaire Classe adapté au dashboard -->
                        <!-- Section Liste des Classes -->
                        <div class="card-list">
                            <h2 style="color:brown">Liste des classes de la filière :
                                <strong><?=($libelleFiliere ?? "") ?></strong>
                            </h2>
                            <form action="index.php" class="Filtres" method="get">
                                <input type="hidden" name="page" value="classefiliere">
                                <input type="number" placeholder="Rechercher une filiere ou un niveau par son  Id" name="id" value="<?= $_REQUEST["id"] ?? "" ?>">
                                <button class="btfiltre" type="submit">Filtres</button>
                            </form>

                            <div class="list-container">
                                <?php foreach ($classes as $c): ?>
                                    <!-- Exemple de card classe -->
                                    <div class="class-card">
                                        <h3>CODE: <strong><?= ($c["code"]) ?></strong></h3>
                                        <p>Libelle: <strong> <?= ($c["libelle"]) ?></strong></p>
                                        <!-- <p>Niveau: <strong> <?= $libelleNiveau?></strong></p> -->
                                        <div class="icone">
                                            <form action="index.php?page=modifierclasse" method="post">
                                                <input type="hidden" name="page" value="modifierclasse">
                                                <input type="hidden" name="id" value="<?= $c['id'] ?>">
                                                <button class="mod" type="submit" name="edit"><i class="fa-solid fa-pen" id="edit"></i></button>
                                            </form>

                                            <form action="index.php?page=listclasse" method="post">
                                                <input type="hidden" name="delete_id" value="<?= $c['id'] ?>">
                                                <button class="sup" type="submit" name="delete"><i class="fa-solid fa-trash" id="sup"></i></button>
                                            </form>

                                        </div>


                                    </div>

                                    <!-- Tu pourras générer les autres en PHP -->
                                <?php endforeach; ?>
                            </div>
                        </div>



                    </div>


































                </div>


            </div>


        </div>

    </div>
</body>

</html>