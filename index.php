<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("fonction.php");
define("WEBROOT", "http://localhost:8000/");
//   session_unset();
// $classe=findAllClasses();
// $filiere=findAllFilieres();
// $niveau=findAllNiveaux();
// $etudiant=findAllEtudiants();
// $user=findAllUsers();
// var_dump($user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <?php
    if (isset($_REQUEST["page"])) {
        $page = $_REQUEST["page"] ?? null;

        if (!isset($_SESSION["userConnected"])) {
            header("location:" . WEBROOT);
            exit;
        }

        if ($page == "dashbord") {
            require_once("dashbord.php");
        } elseif ($page == "logout") {
            session_unset(); //Supprime toutes les variables de session actuellement stockées.
            session_destroy();// Détruit la session elle-même
            header("location:" . WEBROOT);
        } elseif ($page == "filiere") {
            $filieres = findAllFilieres(); //recuperation de tous les filieres du fichier 
            // Variable pour le message d'erreur
            $errorlibellefiliere = "";
            // Traitement du formulaire
            if (isset($_REQUEST["ajoutfiliere"])) {
                $verification = true;
                // Vérification du champ libellé
                if (trim($_REQUEST['libelle']) == "") {
                    $errorlibellefiliere = "Le libellé est obligatoire";
                    $verification = false;
                }
                if ($verification) {
                    // Vérifier si le libellé existe déjà
                    if (existeFiliere($_REQUEST["libelle"], $filieres)) {
                        $errorlibellefiliere = "Ce libellé existe déjà";
                        $verification = false;
                    } else {
                        $newFiliere = [
                            "id" => getIdUniqFiliere(),
                            "libelle" => $_REQUEST["libelle"],
                            "image" => "https://picsum.photos/300/200",
                        ];
                        ajoutFiliere($newFiliere);
                        header("Location:index.php?page=filiere");
                        exit;
                    }
                }
            }
            if (isset($_REQUEST["delete"]) && isset($_REQUEST["delete_id"])) {
                deleteFiliere($_REQUEST["delete_id"]); // à définir dans fonction.php
                header("Location: index.php?page=filiere");
                exit;
            }
            require_once("filiere.php");
        } elseif ($page == "niveau") {
            $niveaux = findAllNiveaux();
            $errorlibelleniveau = "";

            // Traitement du formulaire
            if (isset($_REQUEST["ajoutniveau"])) {
                $verification = true;

                // Vérification du champ libellé
                if (trim($_REQUEST['libelle']) == "") {
                    $errorlibelleniveau = "Le libellé est obligatoire";
                    $verification = false;
                }
                if ($verification) {
                    // Vérifier si le libellé existe déjà
                    if (existeNiveau($_REQUEST["libelle"], $niveaux)) {
                        $errorlibelleniveau = "Ce libellé existe déjà";
                        $verification = false;
                    } else {
                        $newNiveau = [
                            "id" => getIdUniqNiveau(),
                            "libelle" => $_REQUEST["libelle"],
                        ];
                        ajoutNiveau($newNiveau);
                        header("Location:index.php?page=niveau");
                        exit;
                    }
                }
            }
            if (isset($_REQUEST["delete"]) && isset($_REQUEST["delete_id"])) {
                deleteNiveau($_REQUEST["delete_id"]); // à définir dans fonction.php
                header("Location: index.php?page=niveau");
                exit;
            }
            require_once("niveau.php");
        } elseif ($page == "classe") {
            // $idClasse = $_REQUEST["id"]; // ID de l'étudiant modifié
            $classes = findAllClasses();
            $filieres = findAllFilieres(); // récupérer toutes les filières
            $niveaux  = findAllNiveaux();  // récupérer tous les niveaux
            $errorCodeClasse = "";
            $errorLibelleClasse = "";
            $code = trim($_REQUEST["code"] ?? "");
            $libelle = trim($_REQUEST["libelle"] ?? "");
            $filiere_id = $_REQUEST["filiere_id"] ?? "";
            $niveau_id = $_REQUEST["niveau_id"] ?? "";

            $verification = "";


            if (isset($_REQUEST["ajoutclasse"])) {
                $verification = true;
                if (trim($_REQUEST["code"]) == "") {
                    $errorCodeClasse = "Le code est obligatoire";
                    $verification = false;
                } elseif (existeCodeClasse($code, $classes,$idClasse)) {
                    $errorCodeClasse = "Ce code existe déjà";
                    $verification = false;
                }
                if (trim($_REQUEST["libelle"]) == "") {
                    $errorLibelleClasse = "Le libelle est obligatoire";
                    $verification = false;
                } elseif (existelibelleClasse($libelle, $classes,$idClasse)) {
                    $errorLibelleClasse = "Ce libelle existe déjà";
                    $verification = false;
                }
                if (trim($_REQUEST["filiere_id"]) == "") {
                    $errorFiliere = "Veuillez sélectionner une filière";
                    $verification = false;
                }
                if (trim($_REQUEST["niveau_id"]) == "") {
                    $errorNiveau = "Veuillez sélectionner une niveau";
                    $verification = false;
                }
                if ($verification == true) {
                    $newClasse = [
                        "id"      => getIdUniqClasse(),
                        "code"    => $_REQUEST["code"],
                        "libelle" => $_REQUEST["libelle"],
                        "filiere" => $_REQUEST["filiere_id"],
                        "niveau"  => $_REQUEST["niveau_id"],
                    ];
                    ajoutClasse($newClasse);
                    header("Location:index.php?page=listclasse");
                    exit;
                }
            }

            require_once("formclasse.php");
        } elseif ($page == "listclasse") {
            $classes = findAllClasses();
            $filieres = findAllFilieres();
            $niveaux = findAllNiveaux();
            $errorCodeClasse = "";
            $errorLibelleClasse = "";
            if (isset($_REQUEST["delete"]) && isset($_REQUEST["delete_id"])) {
                $id = $_REQUEST["delete_id"];
                deleteClasse($id); // à définir dans fonction.php
                header("Location: index.php?page=listclasse");
                exit;
            }
            require_once("listclasse.php");
        } elseif ($page == "modifierclasse") {
            $idClasse = $_REQUEST["id"]; // ID de l'étudiant modifié
            $filieres = findAllFilieres();
            $niveaux = findAllNiveaux();
            $classes = findAllClasses();

            $id = $_REQUEST["id"] ?? "";
            if ($id) {
                $classemod = findClasseById($id);
                if (empty($classemod)) {
                    echo "<h1>Classe introuvable.</h1>";
                    exit;
                }
            }
            $code = "";
            $libelle = "";
            $errorLibelleClasse = "";
            $errorCodeClasse = "";
            $code = $_REQUEST['code'] ?? $classemod['code'];
            $libelle = $_REQUEST['libelle'] ?? $classemod['libelle'];
            $filiere_id = $_REQUEST['filiere_id'] ?? $classemod['filiere'];
            $niveau_id = $_REQUEST['niveau_id'] ?? $classemod['niveau'];
            $verification = "";
            if (isset($_REQUEST["modifierclasse"])) {
                $id = $_REQUEST["id"];
                $verification = true;
                if (trim($_REQUEST["code"]) == "") {
                    $errorCodeClasse = "Le code est obligatoire";
                    $verification = false;
                } elseif (existeCodeClasse($code, $classes,$idClasse)) {
                    $errorCodeClasse = "Ce code existe est déjà utilisé par une autre classe";
                    $verification = false;
                }
                if (trim($_REQUEST["libelle"]) == "") {
                    $errorLibelleClasse = "Le libelle est obligatoire";
                    $verification = false;
                } elseif (existelibelleClasse($libelle, $classes,$idClasse)) {
                    $errorLibelleClasse = "Ce libelle est déjà utilisé par une autre classe.";
                    $verification = false;
                }
                if (trim($_REQUEST["filiere_id"]) == "") {
                    $errorFiliere = "Veuillez sélectionner une filière";
                    $verification = false;
                }
                if (trim($_REQUEST["niveau_id"]) == "") {
                    $errorNiveau = "Veuillez sélectionner une niveau";
                    $verification = false;
                }
                if ($verification == true) {
                    $classeToUpdate = [
                        "id"      => $id,
                        "code"    => $_REQUEST["code"],
                        "libelle" => $_REQUEST["libelle"],
                        "filiere" => $_REQUEST["filiere_id"],
                        "niveau"  => $_REQUEST["niveau_id"],

                    ];
                    modifierClasse($classeToUpdate);
                    header("Location: index.php?page=listclasse");
                    exit;
                }
            }
            require_once("modificationclasse.php");
        } elseif ($page == "classeetudiants") {
            $idClasse = $_GET["id"] ?? 0;
            $etudiants = findAllEtudiants(); // on récupère tous les étudiants
            $etudiants = filterEtudiantsByClasse($etudiants, $idClasse); // on filtre ceux de la classe
            $classe = findClasseById($idClasse); // pour afficher le libellé de la classe
            require_once("classeetudiants.php");
        } elseif ($page == "etudiant") {
            $classes = findAllClasses();
            $filieres = findAllFilieres();
            $niveaux = findAllNiveaux();
            $etudiants = findAllEtudiants();

            $errorNomEtudiant = "";
            $errorPrenomEtudiant = "";
            $errorTelephoneEtudiant = "";
            $errorEmailEtudiant = "";
            $errorAdresseEtudiant = "";
            $errorClasseEtudiant = "";

            $nom = trim($_REQUEST["nom"] ?? "");
            $prenom = trim($_REQUEST["prenom"] ?? "");
            $telephone = trim($_REQUEST["telephone"] ?? "");
            $email = trim($_REQUEST["email"] ?? "");
            $adresse = trim($_REQUEST["adresse"] ?? "");
            $classe = trim($_REQUEST["classe"] ?? "");

            $verification = "";

            if (isset($_REQUEST["ajoutetudiant"])) {
                $verification = true;
                if (trim($_REQUEST["nom"]) == "") {
                    $errorNomEtudiant = "Le nom est obligatoire";
                    $verification = false;
                }
                if (trim($_REQUEST["prenom"]) == "") {
                    $errorPrenomEtudiant = "Le prenom est obligatoire";
                    $verification = false;
                }
                if (trim($_REQUEST["telephone"]) == "") {
                    $errorTelephoneEtudiant = "Le telephone est obligatoire";
                    $verification = false;
                } elseif (existeTelephoneEtudiant($telephone, $etudiants, $idEtudiant)) {
                    $errorTelephoneEtudiant = "Ce numero existe déjà";
                    $verification = false;
                }
                if (trim($_REQUEST["email"]) == "") {
                    $errorEmailEtudiant = "l'email est obligatoire";
                    $verification = false;
                } elseif (existeEmailEtudiant($email, $etudiants, $idEtudiant)) {
                    $errorEmailEtudiant = "Cet email existe déjà";
                    $verification = false;
                }
                if (trim($_REQUEST["adresse"]) == "") {
                    $errorAdresseEtudiant = "l'adresse est obligatoire";
                    $verification = false;
                }
                if (trim($_REQUEST["classe"]) == "") {
                    $errorClasseEtudiant = "Veuillez sélectionner une classe";
                    $verification = false;
                }
                if ($verification == true) {
                    $newEtudiant = [
                        "id"      => getIdUniqEtudiant(),
                        "matricule" => "ETU00" . getIdUniqEtudiant(),
                        "nom"    => $_REQUEST["nom"],
                        "prenom" => $_REQUEST["prenom"],
                        "telephone" => $_REQUEST["telephone"],
                        "email"  => $_REQUEST["email"],
                        "adresse"  => $_REQUEST["adresse"],
                        "classe"  => $_REQUEST["classe"],


                    ];
                    ajoutEtudiant($newEtudiant);
                    header("Location:index.php?page=listetudiant");
                    exit;
                }
            }

            require_once("formetudiant.php");
        } elseif ($page == "listetudiant") {
            $classes = findAllClasses();
            $filieres = findAllFilieres();
            $niveaux = findAllNiveaux();
            $etudiants = findAllEtudiants();
            $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : 0; // convertir en nombre
            // Vérifier que la classe existe
            $classe = findClasseById($id); // renvoie false ou null si la classe n'existe pas

            if (!$classe && $id > 0) {
                echo "<h1>La classe avec l'ID $id'existe pas.</h1>";
                $etudiants = []; // pas d'étudiants à afficher
            } else {
                // filtrer les étudiants
                $etudiants = filterEtudiantsByClasse($etudiants, $id);
            }
            if (isset($_REQUEST["delete"]) && isset($_REQUEST["delete_id"])) {
                $id = $_REQUEST["delete_id"];
                deleteEtudiant($id); // à définir dans fonction.php
                header("Location: index.php?page=listetudiant");
                exit;
            }
            require_once("listetudiant.php");
        } elseif ($page == "modifieretudiant") {
            $idEtudiant = $_REQUEST["id"]; // ID de l'étudiant modifié
            $classes = findAllClasses();
            $niveaux = findAllNiveaux();
            $filieres = findAllFilieres();
            $etudiants = findAllEtudiants();

            $id = $_REQUEST["id"] ?? "";
            if ($id) {
                $etudiantmod = findEtudiantById($id);
                if (empty($etudiantmod)) {
                    echo "<h1>Etudiant introuvable.</h1>";
                    exit;
                }
            }
            $errorNomEtudiant = "";
            $errorPrenomEtudiant = "";
            $errorTelephoneEtudiant = "";
            $errorEmailEtudiant = "";
            $errorAdresseEtudiant = "";
            $errorClasseEtudiant = "";

            $nom = trim($_REQUEST["nom"] ??  $etudiantmod["nom"]);
            $prenom = trim($_REQUEST["prenom"] ??  $etudiantmod["prenom"]);
            $telephone = trim($_REQUEST["telephone"] ??  $etudiantmod["telephone"]);
            $email = trim($_REQUEST["email"] ??  $etudiantmod["email"]);
            $adresse = trim($_REQUEST["adresse"] ??  $etudiantmod["adresse"]);
            $classe = trim($_REQUEST["classe"] ??  $etudiantmod["classe"]);

            $verification = "";
            if (isset($_REQUEST["modifieretudiant"])) {
                $id = $_REQUEST["id"];
                $verification = true;
                if (trim($_REQUEST["nom"]) == "") {
                    $errorNomEtudiant = "Le nom est obligatoire";
                    $verification = false;
                }
                if (trim($_REQUEST["prenom"]) == "") {
                    $errorPrenomEtudiant = "Le prenom est obligatoire";
                    $verification = false;
                }
                if (trim($_REQUEST["telephone"]) == "") {
                    $errorTelephoneEtudiant = "Le telephone est obligatoire";
                    $verification = false;
                } elseif (existeTelephoneEtudiant($telephone, $etudiants, $idEtudiant)) {
                    $errorTelephoneEtudiant = "Ce numéro de téléphone est déjà utilisé par un autre étudiant.";
                    $verification = false;
                }
                if (trim($_REQUEST["email"]) == "") {
                    $errorEmailEtudiant = "l'email est obligatoire";
                    $verification = false;
                } elseif (existeEmailEtudiant($email, $etudiants, $idEtudiant)) {
                    $errorEmailEtudiant = "Cet email est déjà utilisé par un autre étudiant.";
                    $verification = false;
                }
                if (trim($_REQUEST["adresse"]) == "") {
                    $errorAdresseEtudiant = "l'adresse est obligatoire";
                    $verification = false;
                }
                if (trim($_REQUEST["classe"]) == "") {
                    $errorClasseEtudiant = "Veuillez sélectionner une classe";
                    $verification = false;
                }
                if ($verification == true) {
                    $etudiantToUpdate = [
                        "id" => $etudiantmod["id"],
                        "matricule" => $etudiantmod["matricule"],
                        "nom" => $_REQUEST["nom"],
                        "prenom" => $_REQUEST["prenom"],
                        "telephone"  => $_REQUEST["telephone"],
                        "email"  => $_REQUEST["email"],
                        "adresse"  => $_REQUEST["adresse"],
                        "classe"  => $_REQUEST["classe"],
                    ];
                    modifierEtudiant($etudiantToUpdate);
                    header("Location: index.php?page=listetudiant");
                    exit;
                }
            }
            require_once("modificationetudiant.php");
        } elseif ($page == "details") {
            $id = $_REQUEST["id"]; // récupère l'id envoyé dans le bouton
            $etudiant = findEtudiantById($id); // ta fonction de recherche par id
            $filiere=findFiliereById($id);
            $niveau=findNiveauById($id);
            $classes = findAllClasses();
            $niveaux = findAllNiveaux();
            $filieres = findAllFilieres();
            $etudiants = findAllEtudiants();
            require_once("details.php"); // affiche la page détails
        } elseif ($page == "classefiliere") {
            $idFiliere = $_GET["id"] ?? 0;
            $classes=findClassesByFiliereId($idFiliere);
            $filieres = findAllFilieres();
            $niveaux = findAllNiveaux(); // récupère tous les niveaux
            $libelleFiliere = findFiliereLibelleById($idFiliere, $filieres);
            require_once("classefiliere.php");
        } elseif ($page == "classeniveau") {
            $idNiveau = $_GET["id"] ?? 0;
            $classes=findClassesByNiveauId($idNiveau);
            $niveaux = findAllNiveaux();
            $filieres = findAllFilieres();
            $libelleNiveau = findNiveauLibelleById($idNiveau, $niveaux);
            require_once("classeniveau.php");
        } else {
            echo "<h1> Page Introuvable </h1>";
        }
    } else {
        if (isset($_SESSION["userConnected"])) {
            header("location:http://localhost:8000/?page=dashbord");
            exit;
        }
        $errorEmail = "";
        $errorPassword = "";
        $errorLogin = "";

        if (isset($_REQUEST["connect"])) {
            $email = trim($_REQUEST["email"]);
            $password = trim($_REQUEST["password"]);
            $verification = true;
            //validation champs
            if (empty($email)) {
                $errorEmail = "L'email est obligatoire";
                $verification = false;
            }
            if (empty($password)) {
                $errorPassword = "Le mot de passe est obligatoire";
                $verification = false;
            }
            //recherche utilisateur
            if ($verification) {
                // var_dump($email, $password);
                $user = findUserConnected($email, $password);
                if (!empty($user)) {
                    $_SESSION["userConnected"] = $user;
                    header("location:index.php?page=dashbord");
                    exit;
                } else {
                    $errorLogin = "Nom d'utilisateur ou mot de passe incorrect";
                }
            }
        }
        require_once("connexion.php");
    }

    ?>

</body>

</html>