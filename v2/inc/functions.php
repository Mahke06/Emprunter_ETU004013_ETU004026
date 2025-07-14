<?php
require('connection.php');
function verifierConnexion($email, $motdepasse) {
    $email = mysqli_real_escape_string(dbconnect(), $email);
    $motdepasse = mysqli_real_escape_string(dbconnect(), $motdepasse);
    return mysqli_fetch_assoc(mysqli_query(dbconnect(),  "SELECT * FROM Emprunter_membre 
    WHERE email='$email' AND mdp='$motdepasse'"));
}

function getAllCategories() {
    return mysqli_query(dbconnect(), "SELECT * FROM Emprunter_categorie 
    ORDER BY nom_categorie");
}



function searchObjets($id_categorie = 0, $nom_objet = '', $disponible = false) {
    $where = [];
    if ($id_categorie > 0) {
        $id_categorie = (int)$id_categorie;
        $where[] = "o.id_categorie = $id_categorie";
    }

    if ($nom_objet !== '') {
        $nom_objet_esc = mysqli_real_escape_string(dbconnect(), $nom_objet);
        $where[] = "o.nom_objet LIKE '%$nom_objet_esc%'";
    }

    if ($disponible) {
        $where[] = "e.date_retour IS NULL";
    }

    $sql = "SELECT o.id_objet, o.nom_objet, o.id_categorie, c.nom_categorie, e.date_emprunt, e.date_retour FROM Emprunter_objet o
    JOIN Emprunter_categorie c ON o.id_categorie = c.id_categorie
    LEFT JOIN Emprunter_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL";

    if (count($where) > 0) {
        $sql .= " WHERE " . implode(' AND ', $where);
    }

    $sql .= " ORDER BY o.nom_objet";
    return mysqli_query(dbconnect(), $sql);
}



function getObjetById($id) {
    $id = (int)$id;
    return mysqli_fetch_assoc(mysqli_query(dbconnect(), "SELECT * FROM Emprunter_objet WHERE id_objet = $id"));
}

function getImagesByObjetId($id) {
    $id = (int)$id;
    $images = [];
    while ($row = mysqli_fetch_assoc(mysqli_query(dbconnect(), "SELECT * FROM Emprunter_images_objet  WHERE id_objet = $id"))) {
        $images[] = $row;
    }
    return $images;
}

function getHistoriqueEmprunts($id) {
    $id = (int)$id;
    $historique = [];
    while ($row = mysqli_fetch_assoc(mysqli_query(dbconnect(), "SELECT m.nom as nom_membre, e.date_emprunt, e.date_retour FROM Emprunter_emprunt e JOIN Emprunter_membre m ON e.id_membre = m.id_membre 
    WHERE e.id_objet = $id ORDER BY e.date_emprunt DESC"))) {
        $historique[] = $row;
    }
    return $historique;
}


?>