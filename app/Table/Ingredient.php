<?php  
namespace App\Table;

use App\Table\Database;

class Ingredient { 
    public $id; 
    public $libelle; 

    /**
     * Constructeur de la classe
     */
    public function __construct($id, $libelle){ 
        $this->id = $id; 
        $this->libelle = $libelle; 
    }

    /**
     * Ajout un ingredient à une pizza en fonction de leur id
     * @param Int $idPizza Id de la pizza
     * @param Int $idIngredient Id de l'ingredient
     */
    public static function insertPizza($idPizza, $idIngredient){
        $query = "INSERT INTO `listingredient` (`idPizza`, `idIngredient`) VALUES ('$idPizza', '$idIngredient')";
        return Database::insert($query);
    }

    /**
     * Ajout d'un ingrédient
     * @param String $libelle Nom de l'ingrédient
     */
    public static function insert($libelle){
        $query = "INSERT INTO `ingredient` (`libelle`) VALUES ('$libelle')";
        return Database::insert($query);
    }

    /**
     * Mise à jour d'un ingrédient
     * @param Int $id Id de l'ingrédient
     * @param String $libelle Nom de l'ingredient
     */
    public static function update($id, $libelle){
        $query = "UPDATE `ingredient` SET `libelle` = '$libelle' WHERE `id` = $id";
        return Database::update($query);
    }

    /**
     * Supprime un ingrédient
     * @param Int $id Id de l'ingredient
     */
    public static function delete($id){
        $query = "DELETE FROM `ingredient` WHERE `id` = $id";
        return Database::delete($query);
    }

    /**
     * Renvoi la liste de tous les ingrédients
     * @return Array<Ingredient> Liste des ingrédients
     */
    public static function getAll(){
        $query = "select * from ingredient";

        return self::getList($query);
    }

    public static function getById($id){
        $query = "SELECT * FROM ingredient WHERE id = " . $id;
        $result = Database::select($query);
        $row = $result->fetch_array(MYSQL_ASSOC);
        return new Ingredient($row["id"], $row["libelle"]);
    }

    /**
     * Obtient la liste des ingrédients d'une pizza
     * @param Int $id Id de la pizza
     * @return Array<Ingredient> Liste des ingrédients de la pizza
     */
    public static function getByPizzaId($id) {
        $query = "SELECT i.id, i.libelle 
                FROM ingredient i 
                LEFT JOIN listingredient l on i.id = l.idIngredient 
                WHERE l.idPizza = " . $id . "
                ORDER BY l.idIngredient";

        return self::getList($query); 
    }

    /**
     * Renvoi une liste d'ingrédients en fonction de la requete entrée
     * @param String $query Requete de recherche
     * @return Array<Ingredient> Liste des ingredients trouvé
     */
    public static function getList($query){
        $result = Database::select($query); 
        $ingredients = []; 
 
        while($row = $result->fetch_array(MYSQL_ASSOC)) { 
            $ingredient = new Ingredient($row["id"],$row["libelle"]); 
            $ingredients[] = $ingredient; 
        } 
        return $ingredients; 
    }

    /**
     * Supprime tous les ingrédients d'une pizza
     * @param Int $idPizza Id de la pizza
     */
    public static function deleteAllByPizza($idPizza){
        $query = "DELETE FROM `listingredient` WHERE idPizza = " . $idPizza;
        Database::delete($query);
    }
} 
 
?>