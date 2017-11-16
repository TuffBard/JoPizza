<?php 
namespace App\Table;
class Ingredient {
    public $id;
    public $libelle;

    public function __construct($id, $libelle){
        $this->id = $id;
        $this->libelle = $libelle;
    }
}

?>