<?php

class DataBase
{
    /* private $host = "localhost";
     private $username = "dbphp";
     private $password = "4e5u9ytuq";
     private $name_db = "mnefzi_dbphp";
     private $DB;
 */
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $name_db = "tp_php";
    private $DB;

    public function __construct($host = null, $username = null, $password = null, $name_db = null)
    {
        if ($host != null) {
            $this->$host = $host;
            $this->$username = $username;
            $this->$password = $password;
            $this->$name_db = $name_db;
        }
        try {
            $this->DB = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name_db . ";charset=UTF8", $this->username,
                $this->password);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


    public function demande_requete($sql, $tab = array())
    {
        $categorie = $this->DB->prepare($sql);
        try {
            $categorie->execute($tab)
            or die(print_r($categorie->errorInfo(), TRUE));
        } catch (PDOException $e) {
            die('Erreur : requete inexecutable' . $e->getMessage());
            exit();
        }

        return $categorie->fetchall(PDO::FETCH_OBJ);

    }
}