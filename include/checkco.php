<?php

if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password']))
{
    require_once("include/Database.php");

    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $db = Database::getInstance();
    $userDAO = new UserDAO($db);
    $user = $userDAO->getByPseudo($pseudo);

    $user->tryConnect();

    echo "Tout est ok";
    /*
     * Création de session avec pour valeur le nom de l'utilisateur
     */
}
else
{
    echo "Il manque des choses !";
}