<?php
session_start();
require('../inc/functions.php');
$categories = getAllCategories();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout d’un objet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body class="bg-light">

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
<div class="container py-5">
    <h2 class="mb-4">Ajouter un nouvel objet</h2>
    <form action="traitement_ajout_objet.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nom_objet" class="form-label">Nom de l'objet :</label>
            <input type="text" name="nom_objet" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie :</label>
            <select name="categorie" class="form-select" required>
                <?php foreach ($categories as $cat){  ?>
                    <option value="<?php echo $cat['id_categorie'] ; ?>"><?php echo $cat['nom_categorie'] ; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="images[]" class="form-label">Images :</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        </div>

        <button type="submit" class="btn btn-success">Ajouter l'objet</button>
    </form>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
