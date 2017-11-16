<?php   
    namespace App\Table;
    
    use App\Table\Database;
    use App\Table\Ingredient;

class Pizza {
    public $id;
    public $libelle;
    public $prix;
    public $ingredients;

    public function __construct($id, $libelle, $prix) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;

        $listIngredients = [];
        foreach(Ingredient::getIngredientsByPizzaId($this->id) as $ingredient){
            $listIngredients[] = $ingredient->libelle;
        }
        $this->ingredients = join(",",$listIngredients);
    }

    public static function getAllPizzasToJson() {
        $result = Database::select("SELECT * FROM pizza");
        $pizzas = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $pizzas[] = new Pizza($row["id"], $row["libelle"], $row["prix"]);
        }
        echo json_encode($pizzas);
    }
}

?>