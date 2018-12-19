<?php
class products
{
    // catégories : 0-> sans ; 1->CD ; 2->DVD


    private $_db;

    private $_id_product;
    private $_state_product;
    private $_name_product;
    private $_description_product;
    private $_categorie_product;
    private $_price_product;
    private $added_product;
    private $_editiondate_product;
    private $_editor_product;
    private $_author_product;


    /**
     * todo constructor.
     * @param $db
     * set db to private parameter
     */
    public function __construct($db)
    {
        $this->_db = $db ;
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

    /**
     * @return table
     *
     */
    public function getProducts($cat)
    {

        $res = $this->_db->query('SELECT *  , DATE_FORMAT(added_product, "%e/%m/%Y") dateadd FROM mediastore.products WHERE categorie_product = '.$cat );
        return $res;
    }

    public function getProduct($product)
    {

        $res = $this->_db->query('SELECT *  , DATE_FORMAT(added_product, "%e/%m/%Y") dateadd FROM mediastore.products WHERE id_product = '.$product );
        return $res;
    }







}