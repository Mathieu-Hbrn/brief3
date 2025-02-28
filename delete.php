<?php
require_once 'Produit.php';

$produitObject = new Produit();
try {
// Vérifie si l'ID est bien passé dans l'URL
if (isset($_GET['id'])) {
    //Conversion en entier
    $id = intval($_GET['id']);
    if ($produitObject->delete($id)) {
        echo "Produit supprimé !";
    } else {
        echo "Erreur de suppression.";
    }
}} catch (PDOException $e) {
    echo "Erreur de la base de donnée" .$e->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supression produit</title>
</head>
<a href="index.php">Retour à la liste des produits</a>

</html>