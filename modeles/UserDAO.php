<?php


require_once('../include/Database.php');


class UserDAO
{

    private $connection;
    private $table;
    private $user;

    public function __construct(Database $db)
    {
        $this->connection = $db->getConnection();
        $this->table = "compte";
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }


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



}