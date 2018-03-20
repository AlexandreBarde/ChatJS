<?php

class User
{

    private $id_user;
    private $pseudo;
    private $password;

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getLowerPseudo()
    {
        return strtolower($this->pseudo);
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function toArray()
    {
        return array(
            'id_compte' => $this->getIdUser(),
            'pseudo' => $this->getPseudo(),
            'mot_de_passe' => $this->getPassword()
        );
    }

}