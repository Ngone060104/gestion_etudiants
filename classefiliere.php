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
                <div class="menu-item">
                    <i class="fas fa-comment"></i>
                    <span>Classe</span>
                </div>
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
                        <!-- <?php var_dump($classes) ?> -->
                        <!-- Formulaire Classe adapté au dashboard -->
                        <!-- Section Liste des Classes -->
                        <?php if (empty($classes)): ?>
                            <p>Aucune classe trouvée pour cette filiere.</p>
                            <form action="index.php" class="Filtres" method="get">
                                    <input type="hidden" name="page" value="filiere">
                                    <button class="btfiltre" type="submit">Listes filiere</button>
                            </form>
                        <?php else: ?>
                            <div class="card-list">
                                <h2 style="color:brown">Liste des classes de la filière :
                                    <strong><?= ($libelleFiliere ?? "") ?></strong>
                                </h2>
                                <form action="index.php" class="Filtres" method="get">
                                    <input type="hidden" name="page" value="filiere">
                                    <button class="btfiltre" type="submit">Listes filiere</button>
                                </form>

                                <div class="list-container">
                                    <?php foreach ($classes as $c): ?>
                                        <!-- Exemple de card classe -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Libellé</th>
                                                    <th>Filière</th>
                                                    <th>Niveau</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php foreach ($classes as $c): ?>
                                                    <tr>
                                                        <td><?= $c["code"] ?></td>
                                                        <td><?= $c["libelle"] ?></td>
                                                        <td><?= findFiliereLibelleById($c["filiere_id"] ?? $c["filiere"], $filieres) ?? "" ?></td>
                                                        <td><?= findNiveauLibelleById($c["niveau_id"] ?? $c["niveau"], $niveaux) ?? "" ?></td>
                                                 
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                        <!-- Tu pourras générer les autres en PHP -->
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            </div>



                    </div>


































                </div>


            </div>


        </div>

    </div>
</body>

</html>