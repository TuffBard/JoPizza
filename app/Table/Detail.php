<?php
namespace App\Table;

use App\Table\Database;
use App\Table\Pizza;

/**
 * Class gérant le détail d'une commande
 */
class Detail {
    public $id;
    public $idCommande;
    public $idPizza;
    public $idPerso;
    public $pizza;
    public $quantity;

    /**
     * Constructeur de la classe
     * @param Int $id         Id
     * @param Int $idCommande Id de la commande
     * @param Int $idPizza    Id de la pizza
     * @param Int $idPerso    Id de la personnalisation
     */
    public function __construct($id, $idCommande, $idPizza, $idPerso, $quantity){
        $this->id = $id;
        $this->idCommande = $idCommande;
        $this->idPizza = $idPizza;
        $this->idPerso = $idPerso;
        $this->quantity = $quantity;

        $this->pizza = Pizza::getById($idPizza);
    }

    /**
     * Renvoi tout le detail d'une commande en fonction de son id
     * @param  Int $id Id de la commande
     * @return Array<Detail> Details de la commande
     */
    public static function getAllByIdCommande($id){
        $query = "SELECT * FROM Detail WHERE IdCommande = $id";
        return self::getList($query);
    }

    /**
     * Renvoi une liste de details en fonction de la requete entrée
     * @param String $query Requete de recherche
     * @return Array<Commande> Liste des détails trouvés
     */
    public static function getList($query){
        $result = Database::select($query);
        $details = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $details[] = new Detail($row["id"], $row["idCommande"], $row["idPizza"], $row["idPerso"], $row["quantity"]);
        }
        return $details;
    }

    /**
    * Ajoute une pizza à une commande en fonction de son id
    * @param Int $idPizza Id de la pizza
    * @param Int $idIngredient Id de l'ingredient
    * @return Void
    */
    public static function insertPizza($idCommande, $idPizza, $quantity){
        $query = "INSERT INTO `detail` (`idCommande`, `idPizza`, `quantity`) VALUES ('$idCommande', '$idPizza', '$quantity')";
        Database::insert($query);
    }
}
?>
