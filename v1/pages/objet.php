<?php
session_start();
require('../inc/functions.php');

$categories = getAllCategories();
$id_categorie = (int)($_GET['categorie'] ?? 0);
$objets = getAllObjets($id_categorie);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Liste des objets</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
                    <a href="#" class="nav-link">Zavatra</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Autres</a>
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
    <h1 class="mb-4">Liste des objets</h1>

    <form method="get" class="mb-4 w-25">
        <label for="categorie" class="form-label">Filtrer par categorie :</label>
        <select name="categorie" id="categorie" class="form-select" onchange="this.form.submit()">
            <option value="0" <?= $id_categorie === 0 ? 'selected' : '' ?>>Toutes les categories</option>
            <?php foreach ($categories as $cat) { ?>
                <option value="<?php echo $cat['id_categorie']; ?>" <?= $id_categorie === (int)$cat['id_categorie'] ? 'selected' : '' ?>>
                    <?php echo $cat['nom_categorie']; ?>
                </option>
            <?php } ?>
        </select>
    </form>

    <table class="table table-striped">
        <tr>
            <th>Nom de l'objet</th>
            <th>Categorie</th>
            <th>Date de retour</th>
        </tr>
        <?php if (mysqli_num_rows($objets) > 0){  ?>
            <?php while ($objet = mysqli_fetch_assoc($objets)) {  ?>
                <tr>
                    <td><?php echo $objet['nom_objet']; ?></td>
                    <td><?php echo $objet['nom_categorie']; ?></td>
                    <td>
                        <?php echo $objet['date_retour'] ? $objet['date_retour'] : 'Disponible' ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } else {  ?>
            <tr>
                <td colspan="3" class="text-center">Aucun objet trouve.</td>
            </tr>
        <?php } ?>
    </table>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
