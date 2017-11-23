<?php
namespace App\Table;

use App\Table\Database;

class Detail {
    public $id;
    public $idCommande;
    public $idPizza;
    public $idPerso;

    public function __construct($id, $idCommande, $idPizza, $idPerso){
        $this->id = $id;
        $this->idCommande = $idCommande;
        $this->idPizza = $idPizza;
        $this->idPerso = $idPerso;
    }

    /**
    * Ajoute une pizza à une commande en fonction de son id
    * @param Int $idPizza Id de la pizza
    * @param Int $idIngredient Id de l'ingredient
    * @return Void
    */
    public static function insertPizza($idCommande, $idPizza){
        $query = "INSERT INTO `detail` (`idCommande`, `idPizza`) VALUES ('$idCommande', '$idPizza')";
        Database::insert($query);
    }
}
?>
