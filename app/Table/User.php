<?php
namespace App\Table;

use App\Table\Database;

/**
 * Classe de gestion des utilisateur de la partie administration
 */
class User {
    public $id;
    public $name;
    public $login;
    public $password;

    /**
     * Constructeur de la classe
     * @param Int       $id       Id de l'utilisateur
     * @param String    $name     Nom
     * @param String    $login    Nom d'utilisateur
     * @param String    $password Mot de passe
     */
    public function __construct($id, $name, $login, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * Connexion à la partie Admin
     * @param  String $login    Login de l'utilisateur
     * @param  String $password Mot de passe de l'utilisateur
     * @return User           Si connexion ok, renvoi l'utilisateur, sinon NULL
     */
    public static function login($login, $password)
    {
        $password = sha1($password);
        $query = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
        $result = Database::select($query);

        if($result->num_rows != 0){
            $row = $result->fetch_array();
            $user = new User($row["id"],$row["name"],$row["login"],$row["password"]);
            return $user;
        }
        return NULL;
    }
}
?>
