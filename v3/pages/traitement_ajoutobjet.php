<?php
session_start();
require('../inc/functions.php');

if (isset($_POST['nom_objet'], $_POST['categorie']) && isset($_SESSION['id_membre'])) {
    $nom_objet = mysqli_real_escape_string(dbconnect(), $_POST['nom_objet']);
    $categorie = (int)$_POST['categorie'];
    $id_membre = $_SESSION['id_membre'];

    if (mysqli_query(dbconnect(), "INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES ('$nom_objet', $categorie, $id_membre)")) {
        $id_objet = mysqli_insert_id(dbconnect());
        $upload_dir = "../uploads/";
        $image_added = false;

        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
                $name = uniqid() . '_' . basename($_FILES['images']['name'][$i]);
                if (move_uploaded_file($tmp, $upload_dir . $name)) {
                    $is_main = $i === 0 ? 1 : 0;
                    mysqli_query(dbconnect(), "INSERT INTO objet_images (id_objet, image, principale) VALUES ($id_objet, '$name', $is_main)");
                    $image_added = true;
                }
            }
        }

        if (!$image_added) {
            mysqli_query(dbconnect(), "INSERT INTO objet_images (id_objet, image, principale) VALUES ($id_objet, 'default.png', 1)");
        }

        header("Location: objet.php");
    } else {
        echo "<p>Erreur</p><p><a href='ajout_objet.php'>Retour</a></p>";
    }
} else {
    header("Location: ajout_objet.php");
    exit;
}