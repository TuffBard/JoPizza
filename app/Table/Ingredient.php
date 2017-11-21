<?php  
namespace App\Table;

use App\Table\Database;

class Ingredient { 
    public $id; 
    public $libelle; 
 
    public function __construct($id, $libelle){ 
        $this->id = $id; 
        $this->libelle = $libelle; 
    }

    /**
     * Renvoi la liste de tous les ingrédients
     * @return Array<Ingredient> Liste des ingrédients
     */
    public static function getAll(){
        $query = "select * from ingredient";

        return self::getList($query);
    }

    /**
     * Obtient la liste des ingrédients d'une pizza
     * @param Int $id Id de la pizza
     * @return Array<Ingredient> Liste des ingrédients de la pizza
     */
    public static function getByPizzaId($id) {
        $query = "select i.id, i.libelle 
                from ingredient i 
                left join listingredient l on i.id = l.idIngredient 
                where l.idPizza = " . $id; 

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
} 
 
?>