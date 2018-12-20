<?php

class users
{


    private $_db;

    public $_id_user;
    public $_firstname_user;



    /**
     * todo constructor.
     * @param $db
     * set db to private parameter
     */
    public function __construct($db)
    {
        $this->_db = $db;
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


    public function setNewUser($userinfos)
    {
        $req = $this->_db->prepare('INSERT INTO users (type_user , email_user , adress_user , postal_user , pass_user, firstname_user , lastname_user ) VALUES (:type , :email , :adress , :postal , :pass , :firstname , :lastname )');
        $req->bindValue(':type', 2, PDO::PARAM_INT);
        $req->bindValue(':email', $userinfos['emailsubs'], PDO::PARAM_STR);
        $req->bindValue(':adress', $userinfos['adresssubs'], PDO::PARAM_STR);
        $req->bindValue(':postal', $userinfos['postalsubs'], PDO::PARAM_STR);

        $req->bindValue(':pass', $userinfos['passsubs'], PDO::PARAM_STR);
        $req->bindValue(':firstname', $userinfos['firstnamesubs'], PDO::PARAM_STR);
        $req->bindValue(':lastname', $userinfos['lastnamesubs'], PDO::PARAM_STR);

        $verif = $this->_db->prepare('SELECT email_user FROM users WHERE email_user=:email ');
        $verif->bindValue(':email', $userinfos['emailsubs'], PDO::PARAM_STR);
        $verif->execute();


        $count = $verif->fetchColumn();


        if (empty($count)) {
            $req->execute();
            // l'enregistrement s'est bien passé
            header("location:/?subscribe=1");


        } elseif (!empty($count)) {  // l'enregistrement s'est mail passé un email exite déja
            header("location:/?subscribe=0");
        }

    }

    public function getUser($id , $name){


        $infos = $this->_db->prepare('SELECT * FROM users WHERE id_user=:id and firstname_user=:name');
        $infos->bindValue(':id', $id, PDO::PARAM_INT);
        $infos->bindValue(':name', $name, PDO::PARAM_STR);

        $infos->execute();

        while($infosall = $infos->fetch(PDO::FETCH_ASSOC)){
            return $infosall;
        }
    }

    public function getConnexion($infosconnect)
    {

        $verif = $this->_db->prepare('SELECT id_user , email_user , pass_user , firstname_user  FROM users WHERE email_user=:email');
        $verif->bindValue(':email', $infosconnect['connexionemail'], PDO::PARAM_STR);

        $verif->execute();


        while ($check = $verif->fetch(PDO::FETCH_ASSOC) ){
            if(( $check['email_user'] ==  $infosconnect['connexionemail']) && ($check['pass_user'] == $infosconnect['connexionpass'] )){

                $this->_firstname_user = $check['firstname_user'];
                $this->_id_user = $check['id_user'];

                return TRUE ;




            } else { return FALSE;  }

        }

    }

}