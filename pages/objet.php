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

<main>
    <div>
        <h1 class="mb-4">Liste des objets</h1>
        <form method="get" class="mb-4 w-25">
            <label for="categorie" >Filtrer par categorie :</label>
            <select name="categorie" id="categorie" >
                <option value="0" <?= $id_categorie === 0 ? 'selected' : '' ?>>Toutes les categories</option>
                <?php foreach ($categories as $cat) {  ?>
                    <option value="<?php echo $cat['id_categorie']; ?>">
                        <?php echo $cat['nom_categorie']; ?>
                    </option>
                <?php } ?>
            </select>
        </form>

        <table>
                <tr>
                    <th>Nom de l'objet</th>
                    <th>Categorie</th>
                    <th>Date de retour (si emprunte)</th>
                </tr>
                <?php if (mysqli_num_rows($objets) > 0){  ?>
                    <?php while ($objet = mysqli_fetch_assoc($objets)) {  ?>
                        <tr>
                            <td><?php echo $objet['nom_objet']; ?></td>
                            <td><?php echo $objet['nom_categorie']; ?></td>
                            <td>
                                <?php echo ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } 
                else {  ?>
                    <tr>
                       
                    </tr>
                <?php }  ?>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
