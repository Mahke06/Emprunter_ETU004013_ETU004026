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
    <title>LOGIN</title>
</head>
<body class="bg-light">

<main class ="text-center">
    <section class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <form action="traitementlog.php" method="get" class="w-50">
        <h1 class="mb-3">Login</h1>
        <div class="mb-3">
            <label class="form-label">Adresse Email :</label>
            <input type="email" name="email" required>
        </div>
        <div class="mb-3">
            <label >Mot de Passe :</label>
            <input type="password" name="mdp" required>
        </div>
        <div class="d-grid gap-2">
            <input type="submit" value="Valider" class="btn btn-success">
        </div>
        <div class="text-center mt-3">
            <a href="inscription.php">S'incrire</a>
        </div>
    </form>
    </section>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
