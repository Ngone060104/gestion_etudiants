<?php
require_once("fonction.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dashbord.css">
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
                <a href="" class="menu-item">
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

                <a href="<?="WEBROOT"?>?page=logout" class="menu-item">
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
            <p class="sous_titre"><?=$_SESSION["userConnected"]["prenom"] ??""?></p>
            <div style="  margin-top: 05%;">
                <div class="P3">
                    <div class="card1">
                        <!-- CONTENU PRINCIPAL -->
                        <main class="content">
                            <h2 class="user">Bienvenue, <?=$_SESSION["userConnected"]["prenom"] ??""?></h2>

                            <!-- Cartes récapitulatives -->
                            <div class="cards">
                                <a href="index.php?page=listetudiant">
                                <div class="card">
                                    <i class="fas fa-user-graduate icon"></i>
                                    <h3>Étudiants</h3>
                                    <p><?=getNombreEtudiants();?></p>
                                </div>
                                </a>
                                <a href="index.php?page=listclasse">
                                <div class="card">
                                    <i class="fas fa-chalkboard-teacher icon"></i>
                                    <h3>Classes</h3>
                                    <p><?=getNombreClasses();?></p>
                                </div>
                                </a>
                                <a href="index.php?page=filiere">
                                <div class="card">
                                    <i class="fas fa-book icon"></i>
                                    <h3>Filières</h3>
                                    <p><?=getNombreFilieres()?></p>
                                </div>
                                </a>
                                <a href="index.php?page=niveau">
                                <div class="card">
                                    <i class="fas fa-users-cog icon"></i>
                                    <h3>niveaux</h3>
                                    <p><?=getNombreNiveaux();?></p>
                                </div>
                                </a>
                            </div>
                        </main>



































                    </div>


                </div>


            </div>

        </div>
</body>

</html>