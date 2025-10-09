<?php
function findUserConnected($email, $password): array
{
    $users = findAllUsers();
    foreach ($users as $user) {

        if ($user["email"] == $email && $user["password"] == $password) {
            return $user;
        }
    }
    return [];
}

function findAllUsers(): array
{
    $datas = jsonToArray();
    return $datas["users"];
}

function findAllFilieres(): array
{
    $datas = jsonToArray();
    return $datas["filieres"];
}

function findAllNiveaux(): array
{
    $datas = jsonToArray();
    return $datas["niveaux"];
}

function findAllClasses(): array
{
    $datas = jsonToArray();
    return $datas["classes"];
}

function findAllEtudiants(): array
{
    $datas = jsonToArray();
    return $datas["etudiants"];
}

function jsonToArray(): array
{
    $json = file_get_contents("data.json");
    $datas = json_decode($json, true);
    return $datas;
}

function arrayToJson(array $data): void
{
    $json = json_encode($data);
    file_put_contents("data.json", $json);
}



function findFiliereLibelleById($id, $filieres)
{
    foreach ($filieres as $filiere) {
        if ($filiere["id"] == $id) {
            return $filiere["libelle"];
        }
    }
}

function findNiveauLibelleById($id, $niveaux)
{
    foreach ($niveaux as $niveau) {
        if ($niveau["id"] == $id) {
            return $niveau["libelle"];
        }
    }
    return null; // si le niveau n'existe pas
}



function findClasseById($id): array
{
    $datas = jsonToArray();
    foreach ($datas["classes"] as $classe) {
        if ($classe["id"] == $id) {
            return $classe;
        }
    }
    return [];
}

function findEtudiantById($id): array
{
    $datas = jsonToArray();
    foreach ($datas["etudiants"] as $etudiant) {
        if ($etudiant["id"] == $id) {
            return $etudiant;
        }
    }
    return []; // Si aucun étudiant n'est trouvé
}

function findLibelleClasseById($idClasse): string
{
    $datas = jsonToArray();
    foreach ($datas["classes"] as $classe) {
        if ($classe["id"] == $idClasse) {
            return $classe["libelle"];
        }
    }
    return "Classe inconnue";
}


function getIdUniqEtudiant(): int
{
    $datas = jsonToArray();
    if (empty($datas["etudiants"])) {
        return 1;
    }
    $ids = array_column($datas["etudiants"], 'id');
    return max($ids) + 1;
}

function getIdUniqClasse(): int
{
    $datas = jsonToArray();

    if (empty($datas["classes"])) {
        return 1; // si pas encore de classe, le premier ID sera 1
    }
    // Récupérer tous les IDs existants
    // array_column($datas["articles"], 'id') : récupère tous les IDs existants.
    $ids = array_column($datas["classes"], 'id');
    // Retourner le plus grand ID + 1
    // max($ids) : trouve le plus grand ID déjà utilisé.
    // max($ids) + 1 : le nouvel ID sera forcément unique.
    return max($ids) + 1;
}

function getIdUniqFiliere(): int
{
    $datas = jsonToArray();
    if (empty($datas["filieres"])) {
        return 1;
    }
    $ids = array_column($datas["filieres"], 'id');
    return max($ids) + 1;
}

function getIdUniqNiveau(): int
{
    $datas = jsonToArray();
    if (empty($datas["niveaux"])) {
        return 1;
    }
    $ids = array_column($datas["niveaux"], 'id');
    return max($ids) + 1;
}

function ajoutFiliere($libelle): void
{
    $datas = jsonToArray();
    array_push($datas["filieres"], $libelle);
    arrayToJson($datas);
}

function ajoutNiveau($libelle): void
{
    $datas = jsonToArray();
    array_push($datas["niveaux"], $libelle);
    arrayToJson($datas);
}

function ajoutClasse($classe): void
{
    $datas = jsonToArray();
    array_push($datas["classes"], $classe);
    arrayToJson($datas);
}

function ajoutEtudiant($etudiant): void
{
    $datas = jsonToArray();
    array_push($datas["etudiants"], $etudiant);
    arrayToJson($datas);
}

function ajoutTache($tache): void
{
    $data = jsonToArray();
    // $data["taches"][]=$tache;
    array_push($data["taches"], $tache);
    arrayToJson($data);
}

function deleteFiliere(int $id): void
{
    $datas = jsonToArray();
    foreach ($datas["filieres"] as $index => $filiere) {
        if ($filiere['id'] == $id) {
            unset($datas["filieres"][$index]);
            arrayToJson($datas);
            return;
        }
    }
}

function deleteNiveau(int $id): void
{
    $datas = jsonToArray();
    foreach ($datas["niveaux"] as $index => $niveau) {
        if ($niveau['id'] == $id) {
            unset($datas["niveaux"][$index]);
            arrayToJson($datas);
            return;
        }
    }
}

function deleteClasse(int $id): void
{
    $datas = jsonToArray();
    foreach ($datas["classes"] as $index => $classe) {
        if ($classe['id'] == $id) {
            unset($datas["classes"][$index]);
            arrayToJson($datas);
            return;
        }
    }
}



function deleteEtudiant(int $id): void
{
    $datas = jsonToArray();
    foreach ($datas["etudiants"] as $index => $etudiant) {
        if ($etudiant['id'] == $id) {
            unset($datas["etudiants"][$index]);
            arrayToJson($datas);
            return;
        }
    }
}

function deleteTache(int $id): void
{
    $datas = jsonToArray();
    foreach ($datas["taches"] as $index => $tache) {
        if ($tache['id'] == $id) {
            unset($datas["taches"][$index]);
            arrayToJson($datas);
            return;
        }
    }
}




function modifierClasse($ClasseModifier): void
{
    $datas = jsonToArray();
    foreach ($datas["classes"] as $index => $classe) {
        if ($classe['id'] == $ClasseModifier["id"]) {
            $datas["classes"][$index] = $ClasseModifier;
            arrayToJson($datas);
            return;
        }
    }
}

function modifierEtudiant($EtudiantModifier): void
{
    $datas = jsonToArray();
    foreach ($datas["etudiants"] as $index => $etudiant) {
        if ($etudiant['id'] == $EtudiantModifier["id"]) {
            $datas["etudiants"][$index] = $EtudiantModifier;
            arrayToJson($datas);
            return;
        }
    }
}

function modifierTache($tacheModifier): void
{
    $datas = jsonToArray();
    foreach ($datas["taches"] as $index => $tache) {
        if ($tache['id'] == $tacheModifier["id"]) {
            $datas["taches"][$index] = $tacheModifier;
            arrayToJson($datas);
            return;
        }
    }
}

function hello(): void
{
    echo "Bonjour le monde";
}

// Nombre de filières
function getNombreFilieres(): int
{
    $datas = jsonToArray();// On récupère toutes les données du fichier JSON sous forme de tableau associatif
    return isset($datas["filieres"]) ? count($datas["filieres"]) : 0;
    // Si la clé "filieres" existe dans $datas, on retourne le nombre de filières
    // Sinon, on retourne 0 pour éviter une erreur
    //compter le nombre total de filières enregistrées dans mon fichier JSON.
}

// Nombre de niveaux
function getNombreNiveaux(): int
{
    $datas = jsonToArray();
    return isset($datas["niveaux"]) ? count($datas["niveaux"]) : 0;
}

// Nombre de classes
function getNombreClasses(): int
{
    $datas = jsonToArray();
    return isset($datas["classes"]) ? count($datas["classes"]) : 0;
}

// Nombre d'étudiants
function getNombreEtudiants(): int
{
    $datas = jsonToArray();
    return isset($datas["etudiants"]) ? count($datas["etudiants"]) : 0;
}

function findClassesByFiliereId($id): array
{
    $classes = findAllClasses();
    $trouve = [];
    foreach ($classes as $classe) {
        if ($classe["filiere"] == $id) {
            array_push($trouve, $classe);
        }
    }
    return $trouve;
}

function findClassesByNiveauId($id): array
{
    $classes = findAllClasses();
    $trouve = [];
    foreach ($classes as $classe) {
        if ((int)$classe["niveau"] ==(int) $id) {
            array_push($trouve, $classe);
        }
    }
    return $trouve;
}
// function findClassesByNiveauId($id): array {
//     $classes = findAllClasses();
//     $trouve = [];
//     foreach($classes as $classe){
//         if ((string)$classe["niveau"] == (string)$id) {
//             $trouve[] = $classe;
//         }
//     }
//     return $trouve;
// }


function existeNiveau($libelle, $niveaux)
{
    foreach ($niveaux as $niveau) {
        if (strtolower(trim($niveau["libelle"])) == strtolower(trim($libelle))) {
            return true; // trouvé
        }
    }
    return false; // pas trouvé
}

function existeFiliere($libelle, $filieres)
{
    foreach ($filieres as $filiere) {
        if (strtolower(trim($filiere["libelle"])) == strtolower(trim($libelle))) {
            return true; // trouvé
        }
    }
    return false; // pas trouvé
}

function existeCodeClasse($code, $classes)
{
    foreach ($classes as $classe) {
        if (strtolower(trim($classe["code"])) == strtolower(trim($code))) {
            return true; // trouvé
        }
    }
    return false; // pas trouvé
}

function existelibelleClasse($libelle, $classes)
{
    foreach ($classes as $classe) {
        if (strtolower(trim($classe["libelle"])) == strtolower(trim($libelle))) {
            return true; // trouvé
        }
    }
    return false; // pas trouvé
}

function existeTelephoneEtudiant($telephone, $etudiants, $id)
{
    foreach ($etudiants as $etudiant) {
        if ($etudiant["id"] != $id && strtolower(trim($etudiant["telephone"])) == strtolower(trim($telephone))) {
            return true; // trouvé
        }
    }
    return false; // pas trouvé
}

function existeEmailEtudiant($email, $etudiants, $id)
{
    foreach ($etudiants as $etudiant) {
        if ($etudiant["id"] != $id && strtolower(trim($etudiant["email"])) == strtolower(trim($email))) {
            return true; // trouvé
        }
    }
    return false; // pas trouvé
}

function filterEtudiantsByClasse($etudiants, $idClasse)
{
    if (empty($idClasse) || $idClasse == 0) {
        return $etudiants; // si aucun ID n'est fourni, on retourne tous les étudiants
    }
    // Vérifier que la classe existe
    $classe = findClasseById($idClasse);
    if (!$classe) {
        return []; // si la classe n'existe pas, on retourne un tableau vide
    }

    $filtered = [];
    foreach ($etudiants as $e) {
        if ($e['classe'] == $idClasse) { // on compare directement les ID
            $filtered[] = $e;
        }
    }

    return $filtered;
}

function findFiliereById($id)
{
    $filieres = findAllFilieres(); // récupère toutes les filières

    foreach ($filieres as $filiere) {
        if ($filiere["id"] == $id) {
            return $filiere; // renvoie toute la filière
        }
    }

    return null; // si l'ID n'existe pas
}

function findNiveauById($id)
{
    $niveaux = findAllNiveaux(); // récupère toutes les filières

    foreach ($niveaux as $niveau) {
        if ($niveau["id"] == $id) {
            return $niveau; // renvoie toute la filière
        }
    }

    return null; // si l'ID n'existe pas
}

function filterClasseByFiliere($classes, $idFiliere)
{
    // Si aucun ID n’est fourni, on retourne toutes les classes
    if (empty($idFiliere) || $idFiliere == 0) {
        // return $classes;
        return [];
    }

    // Vérifier que la filière existe
    $filiere = findFiliereById($idFiliere);
    if (!$filiere) {
        return []; // si la filière n'existe pas, on retourne un tableau vide
    }

    // Filtrer les classes selon la filière
    $filtered = [];
    foreach ($classes as $c) {
        if ($c['filiere'] == $idFiliere) {
            $filtered[] = $c;
        }
    }

    return $filtered;
}

function filterClasseByNiveau($classes, $idNiveau)
{
    // Si aucun ID n’est fourni, on retourne toutes les classes
    if (empty($idNiveau) || $idNiveau == 0) {
        // return $classes;
        return [];
    }

    // Vérifier que la filière existe
    $niveau = findNiveauById($idNiveau);
    if (!$niveau) {
        return []; // si la filière n'existe pas, on retourne un tableau vide
    }

    // Filtrer les classes selon la filière
    $filtered = [];
    foreach ($classes as $c) {
        if ($c['filiere'] == $idNiveau) {
            $filtered[] = $c;
        }
    }

    return $filtered;
}
