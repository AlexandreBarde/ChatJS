<?php

session_start();

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
        $_SESSION['username'] = $pseudo;
        header("Location: ../index.php");
        echo "Connexion ok";
    }
    else
    {
        $_SESSION['erreur'] = 1;
        header("Location: ../index.php");
        echo "Mauvais mdp";
    }

    /*
     * Création de session avec pour valeur le nom de l'utilisateur
     */
}
else
{
    $_SESSION['erreur'] = 0;
    echo "Il manque des choses !";
}