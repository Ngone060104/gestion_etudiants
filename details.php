<?php
require_once("fonction.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./details.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="Dash">

        <div class="P1">
            <!-- Logo en haut -->
            <div class="top">
                <img src="./221logo.jpg" alt="Logo SocialTrack" class="logo-img">
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
            <input type="text" style="margin-top: 1%; margin-left: 05%; border: 1px solid ghostwhite; padding: 05px; border-radius: 50px; width: 30%;height: 15px;"
                placeholder="Search" class="recherche">
            <i class="fas fa-bell" id="bell"></i>
            <img src="https://picsum.photos/300/200" class="img2">
            <h4>Bienvenue</h4>
            <p class="sous_titre"><?= $_SESSION["userConnected"]["prenom"] ?? "" ?></p>
            <div style="  margin-top: 05%;">
                <div class="P3">
                    <div class="card1">
                        <!-- CONTENU PRINCIPAL -->

                        <div class="main-content">
                            <div class="card">
                                <div class="card-header">
                                    <img src="https://picsum.photos/300/200" alt="" class="profile-pic">
                                    <h2>Détails de l'Étudiant</h2>
                                </div>
                                <?php
                                $niveaux = findAllNiveaux();
                                $filieres = findAllFilieres();
                                ?>

                                <div class="info-container">
                                    <div class="info-left">
                                        <div class="info-item"><strong>Matricule :</strong> <?= $etudiant['matricule'] ?> </div>
                                        <div class="info-item"><strong>Nom :</strong> <?= $etudiant['nom'] ?> </div>
                                        <div class="info-item"><strong>Prénom :</strong><?= $etudiant['prenom'] ?></div>
                                        <div class="info-item"><strong>Téléphone :</strong> <?= $etudiant['telephone'] ?></div>
                                        <div class="info-item"><strong>Email :</strong><?= $etudiant['email'] ?></div>
                                    </div>
                                    <div class="info-right">
                                        <div class="info-item"><strong>Adresse :</strong><?= $etudiant['adresse'] ?></div>
                                        <div class="info-item"><strong>Classe :</strong><?= findLibelleClasseById($etudiant['classe']) ?></div>
                                        <!-- <div class="info-item"><strong>Filiere :</strong><?= findFiliereLibelleById($id, $filieres), $filieres["libelle"] ?? "" ?></div>
                                        <div class="info-item"><strong>Niveau :</strong><?= findNiveauLibelleById($id, $niveaux), $niveaux["libelle"] ?? "" ?></div>  -->



                                    </div>
                                </div>

                                <div class="observation">
                                    <strong>Observation :</strong> <?= $etudiant['observation'] ?? "Aucune observation" ?>
                                </div>


                                <div class="btn-container">
                                    <a href="index.php?page=listetudiant" class="btn">Retour Liste</a>
                                </div>
                            </div>
                        </div>




















                    </div>


                </div>


            </div>

        </div>
</body>

</html>