<?php
session_start();
require('../inc/functions.php');
$id_objet = (int)($_POST['id_objet'] ?? 0);
$id_membre = (int)$_SESSION['id_membre'];

if ($id_objet > 0) {
    $res = mysqli_query(dbconnect(), "SELECT * FROM Emprunter_emprunt WHERE id_objet = $id_objet AND date_retour IS NULL");
    if (mysqli_num_rows($res) == 0) {
        $date = date('Y-m-d');
        mysqli_query(dbconnect(), "INSERT INTO Emprunter_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES ($id_objet, $id_membre, '$date', NULL)");
    }
}
header('Location: objet.php');
exit;
?>
