<?php

if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password']))
{

    require_once("Database.php");
    require("../modeles/UserDAO.php");

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    echo "Tentative de connexion de " . $pseudo . " : " . $password . "<br />";

    $db = Database::getInstance();

    $userDAO = new UserDAO($db);

    $testUser = $userDAO->getByPseudo($pseudo);

    if($userDAO->tryConnect($pseudo, $password))
    {
        echo "Connexion ok";
    }
    else
    {
        echo "Mauvais mdp";
    }

    /*
     * Création de session avec pour valeur le nom de l'utilisateur
     */
}
else
{
    echo "Il manque des choses !";
}