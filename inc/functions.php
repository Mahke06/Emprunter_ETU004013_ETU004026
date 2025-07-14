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

function getAllObjets($id_categorie = 0) {
    $sql = "SELECT o.id_objet, o.nom_objet, c.nom_categorie, e.date_emprunt, e.date_retour 
    FROM Emprunter_objet o JOIN Emprunter_categorie c ON o.id_categorie = c.id_categorie 
    LEFT JOIN Emprunter_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL";

    if ($id_categorie > 0) {
        $id_categorie = (int)$id_categorie;
        $sql .= " WHERE o.id_categorie = $id_categorie";
    }
    $sql .= " ORDER BY o.nom_objet";
    return mysqli_query(dbconnect(), $sql);
}

?>