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

                    <div class="table-container">
                        <h2>Liste des Classes</h2>
                        <form action="index.php" class="Filtres" method="get">
                            <input type="hidden" name="page" value="classe">
                            <button class="btfiltre" type="submit">Ajouter</button>
                        </form>

                        <table>
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Libellé</th>
                                    <th>Filière</th>
                                    <th>Niveau</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($classes as $classe): ?>
                                    <tr>
                                        <td><?= $classe["code"] ?></td>
                                        <td><?= $classe["libelle"] ?></td>
                                        <td><?= findFiliereLibelleById($classe["filiere_id"] ?? $classe["filiere"], $filieres) ?? "" ?></td>
                                        <td><?= findNiveauLibelleById($classe["niveau_id"] ?? $classe["niveau"], $niveaux) ?? "" ?></td>
                                        <td class="actions">
                                            <form action="index.php?page=modifierclasse" method="post">
                                                <input type="hidden" name="id" value="<?= $classe['id'] ?>">
                                                <button class="mod"><i class="fa-solid fa-pen" id="modifier" title="modifier"></i></button>
                                            </form>

                                            <form action="index.php?page=listclasse" method="post">
                                                <input type="hidden" name="delete_id" value="<?= $classe['id'] ?>">
                                                <button class="sup" type="submit" name="delete"><i class="fa-solid fa-trash" id="supprimer" title="Supprimer"></i></button>
                                            </form>
                                
                                            <form action="index.php" method="get">
                                                <input type="hidden" name="page" value="classeetudiants">
                                                <input type="hidden" name="id" value="<?= $classe['id'] ?>">
                                                <button class="voir" type="submit" title="Voire Listes">
                                                    <i class="fa-regular fa-eye"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>




                </div>


































            </div>


        </div>


    </div>

    </div>
</body>

</html>