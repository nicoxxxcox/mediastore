<?php

class users
{


    public $_db;

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
            header("location:/?page=subscribe&reg=1");


        } elseif (!empty($count)) {  // l'enregistrement s'est mail passé un email exite déja
            header("location:/?page=subscribe&reg=0");
        }

    }

    public function getUser($name , $id){
        $infos = $this->_db->prepare('SELECT * FROM users WHERE id_user=:id and firstname_user=:name');
        $infos->bindValue(':id', $id, PDO::PARAM_STR);
        $infos->bindValue(':name', $name, PDO::PARAM_STR);
        $infos->execute();
        while($infosall = $infos->fetch(PDO::FETCH_ASSOC)){
            return $infosall;
        }
    }

    public function setUser($form){
        $mod = $this->_db->prepare('UPDATE users SET  email_user = :email , adress_user = :adress , postal_user = :postal , pass_user = :pass, firstname_user = :firstname , lastname_user = :lastname ');
        $mod->bindValue(':email', $form['emailmod'], PDO::PARAM_STR);
        $mod->bindValue(':adress', $form['adressmod'], PDO::PARAM_STR);
        $mod->bindValue(':postal', $form['postalmod'], PDO::PARAM_STR);
        $mod->bindValue(':pass', $form['passmod'], PDO::PARAM_STR);
        $mod->bindValue(':firstname', $form['firstnamemod'], PDO::PARAM_STR);
        $mod->bindValue(':lastname', $form['lastnamemod'], PDO::PARAM_STR);

        $mod->execute();

        return TRUE;
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