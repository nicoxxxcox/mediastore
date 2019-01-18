<?php

class userManager
{
    private $_db;


    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function validateUser($form)
    {
        // ON vérifie si le mail existe dans la base
        $verif = $this->_db->prepare('SELECT email_user , pass_user FROM users WHERE email_user= :mail');
        $verif->bindValue(':mail', $form['connexionemail'], PDO::PARAM_STR);
        $verif->execute();
        $check = $verif->fetchAll();
        //return $check;
        if (empty($check)) {
            return FALSE;
        }
        foreach ($check as $row) {
            if (password_verify($form['connexionpass'], $row['pass_user'])) {
                return TRUE;
            }
        }
        return FALSE;
    }


    public function getUserInfo($infosconnect)
    {
        $verif = $this->_db->prepare('SELECT *  FROM users WHERE email_user=:email');
        $verif->bindValue(':email', $infosconnect['connexionemail'], PDO::PARAM_STR);
        $verif->execute();

        $infos = $verif->fetchAll(PDO::FETCH_ASSOC);
        return $infos;
    }
}