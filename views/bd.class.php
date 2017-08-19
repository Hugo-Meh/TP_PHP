<?php

class DataBase
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $name_db = "tp_php";
    public $DB;

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
            $categorie->execute($tab);
        } catch (PDOException $e) {
            die('Erreur : requete inexecutable' . $e->getMessage());
        }

        return $categorie->fetchall(PDO::FETCH_OBJ);

    }
}