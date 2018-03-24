<?php

require_once('../include/Database.php');
require("User.php");

class UserDAO
{

    private $connection;
    private $table;
    /**
     * @var User
     */
    private $user;

    /**
     * Constructeur de la classe UserDAO
     * UserDAO constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->connection = $db->getConnection();
        $this->table = "compte";
    }

    /** Retourne la table
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Retourne l'utilisateur User
     * @return User
     */
    private function getUser()
    {
        return $this->user;
    }

    /**
     * Retourne vrai si l'insertion s'est bien déroulée
     * @return bool
     */
    public function create()
    {
        $insert = "INSERT INTO " . $this->getTable() . " VALUES(:id_compte, :pseudo, :mot_de_passe)";
        $requete = $this->connection->prepare($insert);
        return $requete->execute(array('id_compte' => $this->user->getIdUser(),
                                       'pseudo' => $this->user->getPseudo(),
                                       'mot_de_passe' => $this->user->getPassword()));
    }


    /**
     * Retourne un tableau qui contient les éléments d'un utilisateur ou faux si aucun utilisateur trouvé
     * en fonction de son id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $select = "SELECT * FROM " . $this->getTable() . " WHERE id_compte = ?";
        $requete = $this->connection->prepare($select);
        $requete->execute(array($this->getUser()->getIdUser()));
        while($data = $requete->fetch())
        {
            return $data;
        }
        $requete->closeCursor();
        return false;
    }

    /**
     * Retourne un tableau qui contient les élement d'un utilisateur ou faux si aucun utilisateur trouvé
     * en fonction de son pseudo
     * @param $pseudo
     * @return bool|mixed
     */
    public function getByPseudo($pseudo)
    {
        $select = "SELECT * FROM " . $this->getTable() . " WHERE pseudo = :pseudo";
        $requete = $this->connection->prepare($select);
        $requete->execute(array('pseudo' => $pseudo));
        while($data = $requete->fetch())
        {
            return $data['id_compte'];
        }
        $requete->closeCursor();
        return false;
    }

    /**
     * Retourne vrai si le mot de passe de la base de données correspond au mot de passe qui est stocké en paramètre
     * @param $password
     * @return bool
     */
    public function tryConnect()
    {
        return ($this->getUser()->getPassword() == $this->getPasswordDB($this->getUser()->getPseudo()));
    }

    /**
     * Retourne le mot de passe de l'utilisateur stocké dans la base de données
     * Retourne faux si l'utilisateur n'a pas été trouvé
     * @return bool
     */
    private function getPasswordDB($pseudo)
    {
        $select = "SELECT mot_de_passe FROM " . $this->getTable() . " WHERE pseudo = :pseudo";
        $requete = $this->connection->prepare($select);
        $requete->execute(array('pseudo' => $pseudo));
        while($data = $requete->fetch())
        {
            return $data['mot_de_passe'];
        }
        $requete->closeCursor();
        return false;
    }

}