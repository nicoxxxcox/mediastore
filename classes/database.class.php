<?php

include "inc/config.php";

class database
{
    /*
     *
     */
    private $_bdd;
    static public $bdd;

    static public function pdo()
    {
        try {
            self::$bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // tester la connexion à la bdd
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage()); // si ratée affichée la connexion à la bdd
        }
    }

    public function __construct()
    {
        try {
            $this->_bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // tester la connexion à la bdd
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage()); // si ratée affichée la connexion à la bdd
        }
    }

    /**
     * @param $sql
     * @return array avec le resultat de la requete en parametre
     */
    public function query($sql, $data = array())
    {
        $req = $this->_bdd->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __get($name)
    {
        return $this->$name;
    }

}