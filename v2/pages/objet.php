<?php
session_start();
require('../inc/functions.php');
$categories = getAllCategories();
$id_categorie = (int)($_GET['categorie'] ?? 0);
$nom_objet = $_GET['nom_objet'] ?? '';
$disponible = isset($_GET['disponible']) && $_GET['disponible'] == '1';

$objets = searchObjets($id_categorie, $nom_objet, $disponible);

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

<section class="container py-4">
  <form method="get" class="mb-4">


    <div class="row g-3 align-items-center">
      <div class="col-auto">
        <label for="categorie" class="form-label mb-0"><strong>Categorie :</strong></label>
        <select name="categorie" id="categorie" class="form-select" onchange="this.form.submit()">
          <option value="0" <?= $id_categorie === 0 ? 'selected' : '' ?>>Toutes les categories</option>
          <?php foreach ($categories as $cat) { ?>
            <option value="<?php echo $cat['id_categorie'] ; ?>" <?php echo $id_categorie === (int)$cat['id_categorie'] ? 'selected' : '' ?>>
              <?php echo $cat['nom_categorie']; ?>
            </option>
          <?php } ?>
        </select>
      </div>



      <div class="col-auto">
        <label for="nom_objet" class="form-label mb-0"><strong>Nom de l'objet :</strong></label>
        <input type="text" name="nom_objet" id="nom_objet" class="form-control" value="<?php echo $nom_objet ; ?>" onchange="this.form.submit()">
      </div>

      <div class="col-auto d-flex align-items-center">
        <div class="form-check mb-0">
          <input type="checkbox" name="disponible" id="disponible" class="form-check-input" value="1" <?php echo $disponible ? 'checked' : '' ?> onchange="this.form.submit()">
          <label for="disponible" class="form-check-label mb-0">Disponible uniquement</label>
        </div>
      </div>
    </div>


  </form>
</section>





<div class="container py-4">
    <h1 class="mb-4">Liste des objets</h1>

<section class="scroll-wrapper">
    <?php while ($objet = mysqli_fetch_assoc($objets)) { ?>
    <a href="ficheobjet.php?id=<?php echo $objet['id_objet']; ?>" style="text-decoration:none; color:inherit;">
        <article class="card property-card me-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title"><?php echo $objet['nom_objet']; ?></h5>
                <p class="card-text text-muted mb-1"><?php echo $objet['nom_categorie']; ?></p>
                <h6 class="text-success fw-bold">
                    <?php echo $objet['date_retour'] ? $objet['date_retour'] : 'Disponible'; ?>
                </h6>
            </div>
            <img src="../assets/images/defaut.jpg" alt="" style="width:80px; height:auto; border-radius:4px;">
        </div>
        </article>
        </a>
    <?php } ?>

    <?php if (mysqli_num_rows($objets) == 0) { ?>
        <p class="text-center">Aucun objet trouve.</p>
    <?php } ?>
</section>


</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
