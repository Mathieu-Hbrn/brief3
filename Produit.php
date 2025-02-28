<?php
// Necessite l'acces à la base de données
require "Database.php";
class Produit
{
    // Propriété privée
    private $pdo;

    // Constructeur
    public function __construct()
    {
        //Retourne une instance de Database
        $this->pdo = Database::getInstance()->getConnexion();
    }

    /** Ajout d'un nouveau produit dans la bdd
     * @param string $nom Le nom du produit
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajout ok sinon false
     */
    public function ajouter(string $nom, float $prix, int $stock)
    {
        // Requête préparée
        $stmt = $this->pdo->prepare("INSERT INTO articles (nom, prix, stock) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Liste des produits de la bdd
     * @return array Tableau associatif contenant les produits
     */

    public function lister()
    {
        $stmt = $this->pdo->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function edit(int $id, string $nom, float $prix, int $stock)
    {
        $stmt = $this->pdo->prepare("UPDATE articles SET nom=?, prix=?, stock=? WHERE id=?");
        return $stmt->execute([$nom, $prix, $stock, $id]);
    }

    public function delete(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }

}

