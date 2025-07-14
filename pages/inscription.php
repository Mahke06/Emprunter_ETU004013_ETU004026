<?php
require('../inc/functions.php');
$resultat = mysqli_query(dbconnect(), 'SELECT * FROM membre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>INSCRIPTION</title>
</head>
<body>


<main class = "text-center">
    <h1 class="mb-4">Formulaire d'inscription</h1>
    <form action="traitementinscription.php" method="POST" class="w-50">
        <div class="mb-3">
            <label >Adresse Email :</label>
            <input type="email" name="email" required />
        </div>
        <div class="mb-3">
            <label >Nom :</label>
            <input type="text" name="nom"  required />
        </div>
        <div class="mb-3">
            <label class="form-label">Date de naissance :</label>
            <input type="date" name="date_de_naissance"  required />
        </div>
        <div class="mb-3">
            <label>Genre :</label>
            <select name="genre" required>
                <option value="">Choisir</option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
        </div>
        <div class="mb-3">
            <label >Ville :</label>
            <input type="text" name="ville" required />
        </div>
        <div class="mb-3">
            <label >Mot de Passe :</label>
            <input type="password" name="mdp"required />
        </div>
        <div class="d-grid gap-2">
            <input type="submit" value="S'inscrire" class="btn btn-success" />
        </div>
        <div class="text-center mt-3">
            <a href="index.php">Deja membre ??</a>
        </div>
    </form>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
