<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Étudiants de la classe</title>
    <link rel="stylesheet" href="./listclasse.css">
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
                    <div class="table-container">
                        <h2 style="color:brown">
                            Étudiants de la classe :
                            <strong><?= $classe["libelle"] ?? "Classe inconnue" ?></strong>
                        </h2>
                        <a href="index.php?page=listclasse"><button class="btfiltre">Listes</button></a>
                        <?php if (empty($etudiants)): ?>
                            <p>Aucun étudiant trouvé pour cette classe.</p>
                        <?php else: ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($etudiants as $e): ?>
                                        <tr>
                                            <td><?= $e["matricule"] ?></td>
                                            <td><?= $e["nom"] ?></td>
                                            <td><?= $e["prenom"] ?></td>
                                            <td><?= $e["adresse"] ?></td>
                                            <td><?= $e["telephone"] ?></td>
                                            <td><?= $e["email"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                    </div>
































                </div>


            </div>

        </div>

</body>

</html>