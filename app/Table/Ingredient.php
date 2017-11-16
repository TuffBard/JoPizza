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

    public static function getIngredientsByPizzaId($id) {
        $query = "select i.id, i.libelle 
                from ingredient i 
                left join listingredient l on i.id = l.idIngredient 
                where l.idPizza = " . $id; 
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