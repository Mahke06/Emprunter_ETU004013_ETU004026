<?php
session_start();
require('../inc/functions.php');

if (
    isset($_POST['email'], $_POST['nom'], $_POST['date_de_naissance'], $_POST['genre'], $_POST['ville'], $_POST['mdp'])
) 
{
    $email = mysqli_real_escape_string(dbconnect(), $_POST['email']);
    $nom = mysqli_real_escape_string(dbconnect(), $_POST['nom']);
    $date_de_naissance = $_POST['date_de_naissance'];
    $genre = $_POST['genre'];
    $ville = mysqli_real_escape_string(dbconnect(), $_POST['ville']);
    $mdp = $_POST['mdp'];
    $retout = mysqli_query(dbconnect(), "SELECT * FROM Emprunter_membre WHERE email='$email'");

    if (mysqli_query(dbconnect(), "INSERT INTO Emprunter_membre 
    (nom, date_de_naissance, genre, email, ville, mdp, image_profil) 
    VALUES ('$nom', '$date_de_naissance', '$genre', '$email', '$ville', '$mdp', '')")) {
    header("Location: index.php");
    } 
    
    else {
        echo '<p>Erreur</p>';
        echo '<p><a href="inscription.php">Retour</a></p>';
    }

} 
    else {
    header("Location: inscription.php");
    exit;
}
