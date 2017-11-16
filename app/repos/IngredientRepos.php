<?php
    include_once "../class/Ingredient.php";

    class IngredientRepos {

        public function getIngredientsByPizzaId($id) {
            include "../connectdb.php";
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
    }
?>