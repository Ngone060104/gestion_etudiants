<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./listetudiant.css">
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
                        <!-- Section Liste des Classes -->

                        <h2>Liste des Etudiants</h2>
                        <form action="index.php" class="Filtres" method="get">
                            <input type="hidden" name="page" value="etudiant">
                            <button class="btfiltre" type="submit">Ajouter</button>
                        </form>
                       

                        <!-- <?php var_dump($etudiants); ?> -->
                        <table border="1">
                            <thead>
                                <!-- <th>Matricule</th> -->
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <!-- <th>Adresse</th> -->
                                <!-- <th>Classe</th> -->
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php foreach ($etudiants as $etudiant): ?>
                                <tr>
                                    <!-- <td><?= $etudiant["matricule"] ?></td> -->
                                    <td><?= $etudiant["nom"] ?></td>
                                    <td><?= $etudiant["prenom"] ?></td>
                                    <td><?= $etudiant["telephone"] ?></td>
                                    <td><?= $etudiant["email"] ?></td>
                                    <!-- <td><?= $etudiant["adresse"] ?></td> -->
                                    <!-- <td><?= findLibelleClasseById($etudiant["classe"]) ?> </td> -->
                                    <td>
                                        <div class="icone3">
                                            <form action="index.php" method="get">
                                                <input type="hidden" name="page" value="details">
                                                <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
                                                <button class="btdetails" type="submit"><i class="fa-solid fa-circle-info" id="info"></i></button>
                                            </form>

                                            <form action="index.php?page=modifieretudiant" method="post">
                                                <input type="hidden" name="page" value="modifieretudiant">
                                                <input type="hidden" name="id" value="<?= $etudiant['id'] ?>">
                                                <button class="btmodifier" type="submit"><i class="fa-solid fa-pen" id="edit"></i></button>
                                            </form>

                                            <form action="index.php?page=listetudiant" method="post">
                                                <input type="hidden" name="delete_id" value="<?= $etudiant['id'] ?>">
                                                <button class="btsup" type="submit" name="delete"><i class="fa-solid fa-trash" id="sup"></i></button>
                                            </form>

                                        </div>

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
</body>

</html>