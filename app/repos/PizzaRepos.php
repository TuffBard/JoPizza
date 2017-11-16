<?php
    include_once "../class/Pizza.php";
    include_once "IngredientRepos.php";
    
    class PizzaRepos {
        
        private $IngredientRepos;

        public function __construct(){
            $this->IngredientRepos = new IngredientRepos();
        }

        public function getAllPizzasToJson() {
            include "../connectdb.php";
            $query = "SELECT * FROM pizza";
            $result = $mysqli->query($query);
            $pizzas = [];
            while($row = $result->fetch_array(MYSQL_ASSOC)) {
                $pizzas[] = new Pizza($row["id"], $row["libelle"], $row["prix"]);
            }
            echo json_encode($pizzas);
        }
    }
?>