<?php
namespace App\Table;

use App\Table\Database;

class Commande {
    public $id;
    public $idClient;
    public $idPaiement;
    public $total;
    public $horaire;
    public $status;

    /**
     * Constructeur de la classe
     */
    public function __construct($id, $idClient, $idPaiement, $total, $horaire, $status){
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idPaiement = $idPaiement;
        $this->total = $total;
        $this->horaire = $horaire;
        $this->status = $status;
    }

    /**
     * Renvoi une commande en fonction de son id
     * @param int $id Id de la commande
     * @return Commande
     */
    public static function GetById($id){
        $query = "SELECT * FROM commande WHERE id = $id";
        return self::getList($query)[0];
    }

    /**
     * Renvoi une liste de commande en fonction de la requete entrée
     * @param String $query Requete de recherche
     * @return Array<Commande> Liste des commandes trouvée
     */
    public static function getList($query){
        $result = Database::select($query);
        $commandes = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $commandes[] = new Commande($row["id"], $row["idClient"], $row["idPaiement"], $row["total"], $row["horaire"], $row["status"]);
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
        $query = "INSERT INTO `commande` (`idClient`, `horaire`, `total`, `status`) VALUES ('$idClient', '$horaire', '$total', '1')";
        $idCommande = Database::insert($query);
        foreach($details as $idPizza => $quantity){
            Detail::insertPizza($idCommande, $idPizza, $quantity);
        }
        return $idCommande;
    }
}
