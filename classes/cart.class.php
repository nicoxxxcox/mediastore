<?php

class cart
{

    public $_cart;
    private $_db;

    /**
     * todo constructor.
     * @param $db
     * set db to private parameter
     */
    public function __construct($db)
    {
        $this->_db = $db;

        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }

    }

    /**
     * @param $name
     * @return mixed
     * magic method to get privates parameters from the outside
     */
    public function __get($name)
    {
        return $this->$name;
    }

    public function add($id_product)
    {
        // Si l'index de notre produit n'existe pas, on le crée pour eviter une erreur
        if (!isset($_SESSION['panier'][$id_product])) {
            $_SESSION['panier'][$id_product] = 0;
        }

        // On ajoute 1
        $_SESSION['panier'][$id_product]++;

        // On enregistre
        $this->_cart = $_SESSION['panier'];


    }

    public function getInfos($product)
    {
        $res = $this->_db->prepare('SELECT * FROM products WHERE id_product=:id');
        $res->bindValue(':id', $product, PDO::PARAM_INT);
        $res->execute();

        return $res;
    }

    public function productExist($product)
    {
        $res = $this->_db->prepare('SELECT * FROM products WHERE id_product=:id');
        $res->bindValue(':id', $product, PDO::PARAM_INT);
        $res->execute();
        $verif = $res->fetchAll();


        // si le tableau renvoyé est vide on retourne fasle
        if (empty($verif)) {
            return false;
        }
        return true;
    }
}