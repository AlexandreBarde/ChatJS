<?php

if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password']))
{

    require_once("Database.php");

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    echo "Tentative de connexion de " . $pseudo . " : " . $password;

    $db = Database::getInstance();

    echo "OK 1";

    $userDAO = new UserDAO($db);

    echo "OK 2";

    $user = $userDAO->getByPseudo($pseudo);

    echo "Yolo";

    $userDAO->tryConnect();

    echo "Tout est ok";
    /*
     * Création de session avec pour valeur le nom de l'utilisateur
     */
}
else
{
    echo "Il manque des choses !";
}