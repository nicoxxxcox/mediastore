<?php
class cart
{
    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier'] = array();
        }
    }

    public function add($id_product){
        $_SESSION['panier'][$id_product] +=  1 ;
    }
}