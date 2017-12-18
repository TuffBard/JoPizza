<?php
namespace App\Table;

/**
 * Class contenant la liste des status de commande
 */
class Status {
    /**
     * Renvoi un status en fonction de son id
     * @param  Int $id Id du status
     * @return String Libelle du status
     */
    public static function getById($id){
        switch ($id) {
            case 1:
                return "En attente de paiement";
            case 2:
                return "Paiement validé";
            case 3:
                return "Commande terminée";
            case 21:
                return "Echec de paiement";
            case 31:
                return "Commande annulée";
        }
    }
}
 ?>
