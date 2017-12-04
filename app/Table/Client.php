<?php
namespace App\Table;

use App\Table\Database;

/**
 * Classe Client gérant les comptes de la partie Client
 */
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
        $password = sha1($password);
        $query = "SELECT * FROM client WHERE login = '$login' AND password = '$password'";
        $result = Database::select($query);
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            $client = new Client($row["id"],$row["nom"],$row["prenom"],$row["login"],$row["password"],$row["tel"],$row["mail"]);
            return $client;
        }
        return null;
    }

    /**
     * Vérifie si une adresse mail est déjà existante.
     * @param String $mail mail à vérifier
     * @return Bool Vrai si le mail existe, Faux sinon
     */
    public static function MailAlreadyExist($mail){
        $query = "SELECT * FROM client WHERE mail = '$mail'";
        return isset(self::getList($query)[0]);
    }

    /**
     * Vérifie si un login est déjà existant.
     * @param String $login login à vérifier
     * @return Bool Vrai si le login existe, Faux sinon
     */
    public static function LoginAlreadyExist($login){
        $query = "SELECT * FROM client WHERE login = '$login'";
        return isset(self::getList($query)[0]);
    }

    /**
     * Créé un compte client
     * @param  String $nom      Nom du client
     * @param  String $prenom   Prénom du client
     * @param  String $mail     Adresse mail
     * @param  String $tel      Téléphone
     * @param  String $login    Nom d'utilisateur
     * @param  String $password Mot de passe
     * @return Int           Id du client inséré
     */
    public static function insert($nom,$prenom,$mail,$tel,$login,$password){
        $query = "INSERT INTO `client` (`nom`, `prenom`, `login`, `password`,`tel`,`mail`) VALUES ('$nom', '$prenom', '$login', '$password','$tel','$mail')";
        return Database::insert($query);
    }
}
?>
