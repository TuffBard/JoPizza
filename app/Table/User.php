<?php
namespace App\Table;

use App\Table\Database;

class User {
    public $id;
    public $name;
    public $login;
    public $password;

    public function __construct($id, $name, $login, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public static function login($login, $password)
    {
        $password = sha1($password);
        $query = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
        $result = Database::select($query);

        if($result->num_rows != 0){
            $row = $result->fetch_array();
            $client = new User($row["id"],$row["name"],$row["login"],$row["password"]);
            return $client;
        }
        return NULL;
    }
}
?>
