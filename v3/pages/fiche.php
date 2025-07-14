<?php
session_start();
require('../inc/functions.php');

$id_membre = $_SESSION['id_membre'];

$membre_sql = "SELECT * FROM Emprunter_membre WHERE id_membre = $id_membre";
$membre_res = mysqli_query(dbconnect(), $membre_sql);
$membre = mysqli_fetch_assoc($membre_res);

$sql = "SELECT c.id_categorie, c.nom_categorie, o.id_objet, o.nom_objet FROM Emprunter_categorie c
    JOIN Emprunter_objet o ON o.id_categorie = c.id_categorie WHERE o.id_membre = $id_membre ORDER BY c.nom_categorie, o.nom_objet";

$objets_par_categorie = [];
$row = mysqli_query(dbconnect(), $sql);
$res = mysqli_query(dbconnect(), $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $cat_id = $row['id_categorie'];
    if (!isset($objets_par_categorie[$cat_id])) {
        $objets_par_categorie[$cat_id] = [
            'nom_categorie' => $row['nom_categorie'],
            'objets' => []
        ];
    }
    $objets_par_categorie[$cat_id]['objets'][] = [
        'id_objet' => $row['id_objet'],
        'nom_objet' => $row['nom_objet']
    ];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Fiche membre</title>
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
                        <a href="fiche.php" class="nav-link">Profil</a>
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
    <h1>Fiche du membre : <?php echo $membre['nom']; ?></h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <?php if ($membre['image_profil']) { ?>
                <img src="../assets/images/<?php echo $membre['image_profil']; ?>" alt="Profil" class="img-fluid rounded">
            <?php } else { ?>
                <img src="../assets/images/default_profile.jpg" alt="Profil par defaut" class="img-fluid rounded">
            <?php } ?>
        </div>
        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom :</strong> <?php echo $membre['nom']; ?></li>
                <li class="list-group-item"><strong>Date de naissance :</strong> <?php echo $membre['date_de_naissance']; ?></li>
                <li class="list-group-item"><strong>Genre :</strong> <?php echo $membre['genre']; ?></li>
                <li class="list-group-item"><strong>Email :</strong> <?php echo $membre['email']; ?></li>
                <li class="list-group-item"><strong>Ville :</strong> <?php echo $membre['ville']; ?></li>
            </ul>
        </div>
    </div>

    <h2>Objets empruntes par <?php echo $membre['nom']; ?></h2>

    <?php if (empty($objets_par_categorie)) { ?>
        <p>Aucun objet pour ce membre.</p>
    <?php } else { ?>
        <?php foreach ($objets_par_categorie as $categorie) { ?>
            <h3><?php echo $categorie['nom_categorie']; ?></h3>
            <ul class="list-group mb-3">
                <?php foreach ($categorie['objets'] as $objet) { ?>
                    <li class="list-group-item"><?php echo $objet['nom_objet']; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    <?php } ?>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
