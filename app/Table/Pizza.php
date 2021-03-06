<?php
namespace App\Table;

use App\Table\Database;
use App\Table\Ingredient;

/**
 * Classe gérant les pizzas
 */
class Pizza {
    public $id;
    public $libelle;
    public $prix;
    public $ingredients;

    /**
     * Constructeur de la classe
     * @param Int       $id      Id
     * @param String    $libelle Libelle
     * @param Double    $prix    Prix
     */
    public function __construct($id, $libelle, $prix) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;

        $listIngredients = [];
        foreach(Ingredient::getByPizzaId($this->id) as $ingredient){
            $listIngredients[] = $ingredient->libelle;
        }
        $this->ingredients = join(", ",$listIngredients);
    }

    /**
     * Renvoi la liste de toutes les pizzas avec leur ingrédients au format JSON
     * @return JSON liste des pizzas au format JSON
     */
    public static function getAll() {
        $query = "SELECT * FROM pizza";
        return self::getList($query);
    }

    /**
     * Renvoi la liste de toutes les pizzas avec leur ingrédients au format JSON
     * @return JSON liste des pizzas au format JSON
     */
    public static function getAllByIdCommande($id) {
        $query = "SELECT * FROM pizza WHERE ID IN (SELECT IdPizza FROM Detail WHERE idCommande = $id);";
        return self::getList($query);
    }

    /**
     * Renvoi une pizza en fonction de son id
     * @param Int   $id Id de la pizza
     * @return Pizza
     */
    public static function getById($id){
        $query = "SELECT * FROM pizza WHERE id = " . $id;
        $result = Database::select($query);
        $row = $result->fetch_array(MYSQL_ASSOC);
        return new Pizza($row["id"], $row["libelle"], $row["prix"]);
    }

    /**
     * Renvoi une liste de pizza en fonction de la requete entrée
     * @param String    $query  Requete de recherche
     * @return Array<Pizza> Liste des pizzas trouvée
     */
    public static function getList($query){
        $result = Database::select($query);
        $pizzas = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $pizzas[] = new Pizza($row["id"], $row["libelle"], $row["prix"]);
        }
        return $pizzas;
    }

    /**
     * Ajoute une pizza
     * @param String        $libelle        Libellé de la pizza
     * @param Float         $prix           Prix de la pizza
     * @param Array<Int>    $ingredients    Liste des ids des ingrédients de la pizza
     */
    public static function insert($libelle,$prix,$ingredients){
        $query = "INSERT INTO `pizza` (`libelle`, `prix`) VALUES ('$libelle', '$prix')";
        $idPizza = Database::insert($query);
        foreach($ingredients as $ingredient){
            Ingredient::insertPizza($idPizza, $ingredient);
        }
    }

    /**
     * Modifie une pizza
     * @param Int           $idPizza        Id de la pizza à modifier
     * @param String        $libelle        Libellé de la pizza
     * @param Float         $prix           Prix de la pizza
     * @param Array<Int>    $ingredients    Liste des ids des ingrédients de la pizza
     */
    public static function update($idPizza,$libelle,$prix,$ingredients){
        $query = "UPDATE `pizza` SET `libelle` = '$libelle', `prix` = '$prix' WHERE `id` = '$idPizza'";
        Database::update($query);
        //Supprime tous les ingrédients d'une pizza
        Ingredient::deleteAllByPizza($idPizza);
        //Ajoute les ingrédients mis à jour
        foreach($ingredients as $ingredient){
            Ingredient::insertPizza($idPizza, $ingredient);
        }
    }

    /**
     * Supprime une pizza
     * @param Int   $id Id de la pizza
     */
    public static function delete($id){
        //Supprime tous les ingrédients d'une pizza
        Ingredient::deleteAllByPizza($idPizza);

        $query = "DELETE FROM `pizza` WHERE `id` = $id";
        Database::delete($query);
    }
}

?>
