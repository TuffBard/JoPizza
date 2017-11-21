<?php
    use App\Table\Ingredient;
    if(isset($_GET["id"])){
        echo json_encode(Ingredient::getByPizzaId($_GET["id"]));
    }
?>