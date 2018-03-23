<?php

require_once("include/Database.php");

session_start();

$db = Database::getInstance();

if(isset($_SESSION['username']))
{
    header("Location: chat/");
}
else
{
    require("include/connexion.php");
    if(isset($_SESSION['erreur']))
    {
        switch($_SESSION['erreur'])
        {
            case 0:
                echo "<div class=\"container\"><div class=\"alert alert-danger\" role=\"alert\">Tous les champs ne sont pas remplis !</div></div>";
                unset($_SESSION['erreur']);
                break;
            case 1:
                echo "<div class=\"container\"><div class=\"alert alert-danger\" role=\"alert\">Utilisateur ou mot de passe incorrect !</div></div>";
                unset($_SESSION['erreur']);
                break;
            case 2:
                echo "<div class=\"container\"><div class=\"alert alert-danger\" role=\"alert\">Veuillez vous connecter !</div></div>";
                unset($_SESSION['erreur']);
                break;
        }
    }
}