<?php

class Database
{

    private $host;
    private $db_name;
    private $user;
    private $password;

    private $linkPDO;

    private static $_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        try
        {
            $this->host = "localhost";
            $this->db_name = "chatjs";
            $this->user = "root";
            $this->password = "";
            $this->linkPDO = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
            $this->linkPDO->exec("SET CHARACTER SET UTF8");
        }
        catch(Exception $e)
        {
            die("Erreur lors de la connexion à la base de données : $e");
        }
    }

    public function getConnection()
    {
        return $this->linkPDO;
    }

}