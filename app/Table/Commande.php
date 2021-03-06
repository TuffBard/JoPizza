<?php
namespace App\Table;

use App\Table\Database;
use App\Table\Pizza;
use App\Table\Status;
use \DateTime;

/**
 * Classe gérant les commandes
 */
class Commande {
    public $id;
    public $idClient;
    public $idPaiement;
    public $total;
    public $horaire;
    public $idStatus;
    public $status;
    public $details;
    public $client;
    public $quantity;

    /**
     * Constructeur de la classe
     * @param Int       $id         Id
     * @param Int       $idClient   Id du client
     * @param Int       $idPaiement Id du paiement
     * @param Double    $total      Montant total
     * @param DateTime  $horaire    Heure de préparation
     * @param Int       $status     Statut de la commande
     * @param Int       $quantity   Quantité de pizza
     */
    public function __construct($id, $idClient, $idPaiement, $total, $horaire, $idStatus, $quantity){
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idPaiement = $idPaiement;
        $this->total = $total;
        $this->horaire = $horaire;
        $this->idStatus = $idStatus;
        $this->status = Status::getById($idStatus);
        $this->quantity = $quantity;

        $this->details = Detail::getAllByIdCommande($id);
        $this->client = $idClient > 0 ? Client::getById($idClient) : "";
    }

    /**
     * Modifie le status d'une commande
     * @param Int $idCommande Id de  la commande à modifier
     * @param Int $idStatus Id du status à attribuer (Voir table Status)
     * @return Bool True si ok, sinon False
     */
    public static function setStatus($idCommande, $idStatus){
        $query = "UPDATE Commande SET status = '$idStatus' WHERE id = '$idCommande'";
        return Database::update($query);
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
            $commandes[] = new Commande($row["id"], $row["idClient"], $row["idPaiement"], $row["Total"], $row["horaire"], $row["status"], $row["quantity"]);
        }
        return $commandes;
    }

    /**
     * Renvoi toutes les commandes
     */
    public static function getAll() {
        $query = "SELECT * FROM commande";
        return self::getList($query);
    }

    /**
     * Renvoi toutes les commandes du jour
     * @return Array<Commande> Commandes du jour
     */
    public static function getAllOfTheDay() {
        $now = new DateTime();
        $now = $now->format("Y-m-d");
        $query = "SELECT * FROM commande WHERE horaire > '$now' ORDER BY horaire ASC";
        return self::getList($query);
    }

    /**
     * Renvoi toutes les commandes du jour
     * @return Array<Commande> Commandes du jour
     */
    public static function getAllConfirmedOfTheDay() {
        $now = new DateTime();
        $now = $now->format("Y-m-d");
        $query = "SELECT * FROM commande WHERE horaire > '$now' AND status <= '5' ORDER BY horaire ASC";
        return self::getList($query);
    }

    /**
     * Renvoi toutes les commandes d'un client en fonction de son id
     * @param  Int $id Id du client
     * @return Array<Commande>     Liste des commandes du client
     */
    public static function getAllByIdClient($id) {
        $query = "SELECT * FROM commande WHERE idClient = $id ORDER BY horaire DESC";
        return self::getList($query);
    }

    /**
     * Créé une commande
     * @param  Int $idClient Id du client
     * @param  DateTime $horaire  Horaire de préparation de la commande
     * @param  Float $total    Montant total de la commande
     * @param  Array<Int,Int> $details  Tableau contenant l'id et la quantité des pizzas de la commande
     * @param  Int $quantity Quantité total de la commande
     * @return Int           Id de la commande créés
     */
    public static function insert($idClient,$horaire,$total,$details,$quantity){
        $query = "INSERT INTO `commande` (`idClient`, `horaire`, `total`, `status`,`quantity`) VALUES ('$idClient', '$horaire', '$total', '1','$quantity')";
        $idCommande = Database::insert($query);
        foreach($details as $idPizza => $quantity){
            Detail::insertPizza($idCommande, $idPizza, $quantity);
        }
        return $idCommande;
    }
}
