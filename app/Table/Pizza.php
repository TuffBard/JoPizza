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
        foreach(Ingredient::getByPizzaId($this->id) as $ingredient){
            $listIngredients[] = $ingredient->libelle;
        }
        $this->ingredients = join(",",$listIngredients);
    }

    /**
     * Renvoi la liste de toutes les pizzas avec leur ingrédients au format JSON
     * @return JSON liste des pizzas au format JSON
     */
    public static function getAll() {
        $query = "SELECT * FROM pizza";
        $pizzas = self::getListFromQuery($query);
        return $pizzas;
    }

    /**
     * Renvoi une liste de pizza en fonction de la requete entrée
     * @param String $query Requete de recherche
     * @return Array<Pizza> Liste des pizzas trouvée
     */
    public static function getListFromQuery($query){
        $result = Database::select($query);
        $pizzas = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $pizzas[] = new Pizza($row["id"], $row["libelle"], $row["prix"]);
        }
        return $pizzas;
    }
}

?>