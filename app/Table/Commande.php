<?php
namespace App\Table;

use App\Table\Database;

class Commande {
    public $id;
    public $idClient;
    public $idPaiement;
    public $total;

    /**
     * Constructeur de la classe
     */
    public function __construct($id, $idClient, $idPaiement, $total){
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idPaiement = $idPaiement;
        $this->total = $total;
    }

    /**
     * Renvoi une liste de commande en fonction de la requete entrée
     * @param String $query Requete de recherche
     * @return Array<Pizza> Liste des pizzas trouvée
     */
    public static function getList($query){
        $result = Database::select($query);
        $commandes = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $commandes[] = new Commande($row["id"], $row["idClient"], $row["idPaiement"], $row["total"]);
        }
        return $commandes;
    }

    /**
     * Renvoi toute les commandes
     */
    public static function getAll() {
        $query = "SELECT * FROM commande";
        return self::getList($query);
    }

        /**
     * Ajoute une pizza
     * @param String $libelle Libellé de la pizza
     * @param Float $prix Prix de la pizza
     * @param Array<Int> $ingredients Liste des ids des ingrédients de la pizza
     */
    public static function insert($idClient,$horaire,$total,$details){
        $query = "INSERT INTO `commande` (`idClient`, `horaire`, `total`) VALUES ('$idClient', '$horaire', '$total')";
        var_dump($query);
        $idCommande = Database::insert($query);
        foreach($details as $idPizza => $quantity){
            Detail::insertPizza($idCommande, $idPizza, $quantity);
        }
    }
}
