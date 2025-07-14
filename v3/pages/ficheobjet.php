<?php
require('../inc/functions.php');
$id_objet = (int)($_GET['id'] ?? 0);
$objet = getObjetById($id_objet);
$images = getImagesByObjetId($id_objet);
$historique = getHistoriqueEmprunts($id_objet);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Fiche Objet</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark btn btn-success">
        <div class="container">
            <a href="objet.php" class="navbar-brand">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="fiche.php?id=<?= $_SESSION['id_membre'] ?>" class="nav-link">Profil</a>
                </li>
                <li class="nav-item">
                    <a href="upload.php" class="nav-link">Upload</a>
                </li>
                <li>
                    <form action="logout.php" method="post">
                        <button type="submit" name="logout" class="nav-link">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</header>

<main>
<div class="container py-4">
    <h1><?php echo $objet['nom_objet']; ?></h1>
    <div class="mb-4">
        <img src="../assets/images/<?php echo $objet['image_principale'] ?: 'defaut.jpg'; ?>" alt="" style="max-width:300px;">
    </div>

    <div class="mb-4">
        <?php foreach ($images as $img): ?>
            <img src="../assets/images/<?php echo $img['nom_image']; ?>" alt="" style="width:100px; margin-right:10px;">
        <?php endforeach; ?>
    </div>

    <h3>Historique des emprunts</h3>
    <table class="table table-striped">
        <thead>
            <tr><th>Emprunteur</th><th>Date emprunt</th><th>Date retour</th></tr>
        </thead>
        <tbody>
            <?php foreach ($historique as $emprunt): ?>
                <tr>
                    <td><?php echo $emprunt['nom_membre']; ?></td>
                    <td><?php echo $emprunt['date_emprunt']; ?></td>
                    <td><?php echo $emprunt['date_retour'] ?: 'Non retourne'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
