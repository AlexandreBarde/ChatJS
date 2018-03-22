<?php

if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password']))
{

    require_once("Database.php");
    require("../modeles/UserDAO.php");

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    echo "Tentative de connexion de " . $pseudo . " : " . $password . "<br />";

    $db = Database::getInstance();

    echo "OK 1<br />";

    $userDAO = new UserDAO($db);

    echo "OK 2<br />";

    $testUser = $userDAO->getByPseudo($pseudo);

    var_dump($testUser);

    echo "Yolo<br />";

    if($userDAO->tryConnect($pseudo, $password))
    {
        echo "Connexion ok";
    }
    else
    {
        echo "Mauvais mdp";
    }

    echo "Tout est ok<br />";
    /*
     * Création de session avec pour valeur le nom de l'utilisateur
     */
}
else
{
    echo "Il manque des choses !";
}