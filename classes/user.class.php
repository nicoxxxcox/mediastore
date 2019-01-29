<?php

class user
{

    /** @var \PDO */
    public $_db;

    private $_id_user;
    private $_type_user;
    private $_email_user;
    private $_adress_user;
    private $_postal_user;
    private $_pass_user;
    private $_firstname_user;
    private $_lastname_user;
    private $_guid_user;


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

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->_id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->_id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getAdressUser()
    {
        return $this->_adress_user;
    }

    /**
     * @param mixed $adress_user
     */
    public function setAdressUser($adress_user)
    {
        $this->_adress_user = $adress_user;
    }

    /**
     * @return mixed
     */
    public function getTypeUser()
    {
        return $this->_type_user;
    }

    /**
     * @param mixed $type_user
     */
    public function setTypeUser($type_user)
    {
        $this->_type_user = $type_user;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->_email_user;
    }

    /**
     * @param mixed $email_user
     */
    public function setEmailUser($email_user)
    {
        $this->_email_user = $email_user;
    }

    /**
     * @return mixed
     */
    public function getPostalUser()
    {
        return $this->_postal_user;
    }

    /**
     * @param mixed $postal_user
     */
    public function setPostalUser($postal_user)
    {
        $this->_postal_user = $postal_user;
    }

    /**
     * @return mixed
     */
    public function getPassUser()
    {
        return $this->_pass_user;
    }

    /**
     * @param mixed $pass_user
     */
    public function setPassUser($pass_user)
    {
        $this->_pass_user = $pass_user;
    }

    /**
     * @return mixed
     */
    public function getFirstnameUser()
    {
        return $this->_firstname_user;
    }

    /**
     * @param mixed $firstname_user
     */
    public function setFirstnameUser($firstname_user)
    {
        $this->_firstname_user = $firstname_user;
    }

    /**
     * @return mixed
     */
    public function getLastnameUser()
    {
        return $this->_lastname_user;
    }

    /**
     * @param mixed $lastname_user
     */
    public function setLastnameUser($lastname_user)
    {
        $this->_lastname_user = $lastname_user;
    }

    /**
     * @return mixed
     */
    public function getGuidUser()
    {
        return $this->_guid_user;
    }

    /**
     * @param mixed $guid_user
     */
    public function setGuidUser($guid_user)
    {
        $this->_guid_user = $guid_user;
    }

    public function setNewUser($userinfos)
    {
        $req = $this->_db->prepare('INSERT INTO users (type_user , email_user , adress_user , postal_user , pass_user, firstname_user , lastname_user , guid_user ) VALUES (:type , :email , :adress , :postal , :pass , :firstname , :lastname , :guid_user )');
        $req->bindValue(':type', 2, PDO::PARAM_INT);
        $req->bindValue(':email', $userinfos['emailsubs'], PDO::PARAM_STR);
        $req->bindValue(':adress', $userinfos['adresssubs'], PDO::PARAM_STR);
        $req->bindValue(':postal', $userinfos['postalsubs'], PDO::PARAM_STR);

        $req->bindValue(':pass', password_hash($userinfos['passsubs'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $req->bindValue(':firstname', $userinfos['firstnamesubs'], PDO::PARAM_STR);
        $req->bindValue(':lastname', $userinfos['lastnamesubs'], PDO::PARAM_STR);

        $req->bindValue(':guid_user', gen_uuid(), PDO::PARAM_STR);

        $verif = $this->_db->prepare('SELECT email_user FROM users WHERE email_user=:email ');
        $verif->bindValue(':email', $userinfos['emailsubs'], PDO::PARAM_STR);
        $verif->execute();


        $count = $verif->fetchColumn();


        if (empty($count)) {
            $req->execute();
            // l'enregistrement s'est bien passé
            header("location:index.php?page=subscribe&reg=1");
        } elseif (!empty($count)) {
            // l'enregistrement s'est mail passé un email exite déja
            header("location:index.php?page=subscribe&reg=0");
        }
    }

    public function getUser($guid)
    {
        /*
                $infos = $this->_db->prepare('SELECT * FROM users WHERE guid_user=:guid');
                $infos->bindValue(':guid', $guid, PDO::PARAM_STR);
                $infos->execute();
                while ($infosall = $infos->fetch(PDO::FETCH_ASSOC)) {
                    return $infosall;
                }*/

        $infosall = $_SESSION['user'];
        return $infosall;
    }

    public function setUser($form)
    {
        $mod = $this->_db->prepare('UPDATE users SET  email_user = :email , adress_user = :adress , postal_user = :postal , firstname_user = :firstname , lastname_user = :lastname WHERE guid_user = :guid');
        $mod->bindValue(':email', $form['email_user'], PDO::PARAM_STR);
        $mod->bindValue(':adress', $form['adress_user'], PDO::PARAM_STR);
        $mod->bindValue(':postal', $form['postal_user'], PDO::PARAM_STR);
        $mod->bindValue(':firstname', $form['firstname_user'], PDO::PARAM_STR);
        $mod->bindValue(':lastname', $form['lastname_user'], PDO::PARAM_STR);
        $mod->bindValue(':guid', $form['guid_user'], PDO::PARAM_STR);
        $mod->execute();



    }

    public function getConnexion($infosconnect)
    {
        $verif = $this->_db->prepare('SELECT *  FROM users WHERE email_user=:email');
        $verif->bindValue(':email', $infosconnect['connexionemail'], PDO::PARAM_STR);
        $verif->execute();
        while ($check = $verif->fetch(PDO::FETCH_ASSOC)) {
            if (($check['email_user'] == $infosconnect['connexionemail']) && password_verify($check['pass_user'], $infosconnect['connexionpass'])) {
                $this->hydrate($check[0]);
                $_SESSION['user'] = $check[0];

                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

}