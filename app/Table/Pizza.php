<?php   
    namespace App\Table;
    use App\Table\Database;
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
        foreach($this->getIngredientsByPizzaId($this->id) as $ingredient){
            $listIngredients[] = $ingredient->libelle;
        }
        $this->ingredients = join(",",$listIngredients);
    }

    public function getIngredientsByPizzaId($id) {
        $mysqli = Database::getDb();
        $query = "select i.id, i.libelle
                from ingredient i
                left join listingredient l on i.id = l.idIngredient
                where l.idPizza = " . $id;
        $result = $mysqli->query($query);
        $ingredients = [];

        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $ingredient = new Ingredient($row["id"],$row["libelle"]);
            $ingredients[] = $ingredient;
        }
        return $ingredients;
    }

    public static function getAllPizzasToJson() {
        $query = "SELECT * FROM pizza";
        $result = Database::getDb()->query($query);
        $pizzas = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $pizzas[] = new Pizza($row["id"], $row["libelle"], $row["prix"]);
        }
        echo json_encode($pizzas);
    }
}

?>