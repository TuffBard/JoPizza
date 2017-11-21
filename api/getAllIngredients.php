<?php
    use App\Table\Ingredient;
    echo json_encode(Ingredient::getAll());
?>
