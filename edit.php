<?php
require_once 'Produit.php';

$produit = new Produit();

// Récupération depuis le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nom = $_POST['nom'];
    $prix = floatval($_POST['prix']);
    $stock = intval($_POST['stock']);

    //Modification de l'article
    if ($produit->edit($id, $nom, $prix, $stock)) {
        echo "Produit modifié !";
    } else {
        echo "Erreur de modification.";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Modification article</title>
</head>
<body>
<h1>Mise a jour d'article</h1>
<form method="post" action="">
    <table>
        <thead>
        <tr>
            <th><input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>"></th>
            <th><label>Nom du produit</label></th>
            <th><input type="text" name="nom" required></th>
            <th><label>Tarif</label></th>
            <th><input type="text" name="prix" required></th>
            <th><label>Stock</label></th>
            <th><input type="number" name="stock" required></th>
            <th><button type="submit">Valider</button></th>
        </tr>
        </thead>
    </table>
</form>
<a href="index.php">Retour à la liste des produits</a>

</body>
</html>