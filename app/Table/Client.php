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