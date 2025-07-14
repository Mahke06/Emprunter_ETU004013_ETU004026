<?php
require('connection.php');
    function verifierConnexion($email, $motdepasse) {
    $email = mysqli_real_escape_string(dbconnect(), $email);
    $motdepasse = mysqli_real_escape_string(dbconnect(), $motdepasse);
    return mysqli_fetch_assoc(mysqli_query(dbconnect(),  "SELECT * FROM Emprunter_membre 
    WHERE email='$email' AND mdp='$motdepasse'"));
}
?>