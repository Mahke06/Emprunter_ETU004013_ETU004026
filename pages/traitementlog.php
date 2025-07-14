<?php
session_start();
require('../inc/functions.php');

if (isset($_POST['email'], $_POST['mdp'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $membre = verifierConnexion($email, $mdp);
    if ($membre) {
        $_SESSION['id_membre'] = $membre['id_membre'];
        $_SESSION['nom'] = $membre['nom'];
        $_SESSION['email'] = $membre['email'];
        $_SESSION['date_de_naissance'] = $membre['date_de_naissance'];
        $_SESSION['genre'] = $membre['genre'];
        $_SESSION['ville'] = $membre['ville'];
        header("Location: objet.php");
        exit;
    } else {
        echo '<p>Erreur</p>';
        echo '<p><a href="index.php">Retour au login</a></p>';
    }
} else {
    header("Location: objet.php");
    exit;
}
