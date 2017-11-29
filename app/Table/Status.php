<?php
namespace App\Table;

class Status {
    public static function getById($id){
        switch ($id) {
            case 1:
                return "En attente de paiement";
            case 2:
                return "Paiement validé";
            case 3:
                return "En préparation";
            case 4:
                return "Commande prête";
            case 5:
                return "Commande terminée";
            case 21:
                return "Echec de paiement";
            case 31:
                return "Commande annulée";
        }
    }
}
 ?>
