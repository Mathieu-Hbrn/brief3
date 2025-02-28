<?php
require_once 'Produit.php';
$produitObject = new Produit();

//Récupération depuis le formulaire
$nom = $_POST['nom_produit'] ?? '';
$prix = isset($_POST['tarif']) ? floatval($_POST['tarif']) : 0;
$stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;


//Ajout de l'article
if ($produitObject->ajouter($nom, $prix, $stock)){
    echo "Article ajouté";
} else {
    echo "Erreur lor de l'ajout";
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
    <title>Ajout d'un article</title>
</head>
<body>
<form method="POST">
    <table>
        <thead>
        <tr>
            <th><label>Nom du produit</label></th>
            <th><input type="text" name="nom_produit" required></th>
            <th><label>Tarif</label></th>
            <th><input type="text" name="tarif" required></th>
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