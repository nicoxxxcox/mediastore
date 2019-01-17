<?php
class userManager
{
    private $_db;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function validateUser($form){
        extract($form);
        $verif = $this->_db->prepare("SELECT * FROM users WHERE email_user= :mail AND pass_user=:pass ");
        $verif->bindValue(':mail', $connexionemail, PDO::PARAM_STR);
        $verif->bindValue(':pass', $connexionpass, PDO::PARAM_STR);
        $verif->execute();
        $check = $verif->fetchAll();
        return $check;
    }

}