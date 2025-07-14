<?php
require('../inc/functions.php');
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
<body class="bg-light">


<main class="text-center w-50">
    <section class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <form action="traitinscription.php" method="POST">
        <h1 class="mb-3">Formulaire d'inscription</h1>
        <div class="mb-3 text-start">
            <label class="form-label">Adresse Email :</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Nom :</label>
            <input type="text" name="nom" class="form-control" required />
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Date de naissance :</label>
            <input type="date" name="date_de_naissance" class="form-control" required />
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Genre :</label>
            <select name="genre" class="form-select" required>
                <option value="">Choisir</option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Ville :</label>
            <input type="text" name="ville" class="form-control" required />
        </div>
        <div class="mb-3 text-start">
            <label class="form-label">Mot de Passe :</label>
            <input type="password" name="mdp" class="form-control" required />
        </div>
        <div class="d-grid gap-2">
            <input type="submit" value="S'inscrire" class="btn btn-success" />
        </div>
        <div class="mt-3">
            <a href="index.php">Deja membre ?</a>
        </div>
    </form>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
