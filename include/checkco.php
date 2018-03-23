<?php

session_start(); // Création d'une session

if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])) // Vérification des champs envoyés par l'utilisateur
{
    require_once("Database.php");
    require("../modeles/UserDAO.php");
    $pseudo = $_POST['pseudo']; // Stockage du pseudo passé en paramètre
    $password = $_POST['password']; // Stockage du mot de passe passé en paramètre
    $db = Database::getInstance(); // Récupération de l'instance de notre connexion à la base de données
    $userDAO = new UserDAO($db); // Création d'un utilisateur DAO

    $user = new User(); // Création d'un utilisateur
    $user->setPseudo($pseudo); // Attribution du pseudo à l'objet User
    $user->setPassword($password); // Attribution du mot de passe à l'objet User

    $userDAO->setUser($user);

    if($userDAO->tryConnect())
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
}
else
{
    $_SESSION['erreur'] = 0;
    echo "Il manque des choses !";
}