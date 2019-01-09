<?php
class products
{



    private $_db;

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
     * @return mixed
     *
     */
    public function getProducts($cat)
    {

        $res = $this->_db->query('SELECT *  , DATE_FORMAT(added_product, "%e/%m/%Y") dateadd FROM mediastore.products WHERE categorie_product = '.$cat );
        return $res;
    }

    /**
     * @param $product
     * @return mixed - return an array res who contain the product information
     */
    public function getProduct($product)
    {

        $res = $this->_db->query('SELECT *  , DATE_FORMAT(added_product, "%e/%m/%Y") dateadd FROM mediastore.products WHERE id_product = '.$product );
        return $res;
    }

    /**
     * @param $search
     * @return mixed
     */
    public function searchProduct($search){
        $res = $this->_db->prepare('SELECT * , DATE_FORMAT(added_product, "%e/%m/%Y") dateadd FROM products WHERE name_product LIKE :name OR author_product LIKE :author OR categorie_product LIKE :categorie ');

        $res->bindValue(':name', '%' . $search . '%', PDO::PARAM_STR);
        $res->bindValue(':author', '%' . $search . '%', PDO::PARAM_STR);
        $res->bindValue(':categorie','%' . $search . '%', PDO::PARAM_STR);

        $res->execute();

        return $res;
    }







}