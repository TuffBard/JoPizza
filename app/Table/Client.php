<?php
namespace App\Table;

use App\Table\Database;

class Client {
    public $id;
    public $nom;
    public $prenom;
    public $login;
    public $password;
    public $tel;
    public $mail;

    /**
     * Constructeur de la classe
     * @param Int       $id         Id
     * @param String    $nom        Nom
     * @param String    $prenom     Prénom
     * @param String    $login      Login
     * @param String    $password   Password
     * @param String    $tel        Téléphone
     * @param String    $mail       Adresse mail
     */
    public function __construct($id, $nom, $prenom, $login, $password, $tel, $mail)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->password = $password;
        $this->tel = $tel;
        $this->mail = $mail;
    }

    /**
     * Renvoi un client en fonction de son id
     * @param  Int $id Id du client
     * @return Client Client recherché
     */
    public static function getById($id){
        $query = "SELECT * FROM client WHERE id = $id";
        return self::getList($query)[0];
    }

    /**
     * Renvoi une liste de client en fonction de la requete entrée
     * @param String $query Requete de recherche
     * @return Array<Client> Liste des clients trouvés
     */
    public static function getList($query){
        $result = Database::select($query);
        $commandes = [];
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $commandes[] = new Client($row["id"], $row["nom"], $row["prenom"], $row["login"], $row["password"], $row["tel"], $row["mail"]);
        }
        return $commandes;
    }

    /**
     * Renvoi un user en fonction des logins entrés
     * @param  String $login    Login
     * @param  String $password Mot de passe
     * @return Client Renvoi un client ou null
     */
    public static function login($login, $password)
    {
        $query = "SELECT * FROM client WHERE login = '$login' AND password = '$password'";
        $result = Database::select($query);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            $client = new Client($row["id"],$row["nom"],$row["prenom"],$row["login"],$row["password"],$row["tel"],$row["mail"]);
            return $client;
        }
        return null;
    }
}
?>
