<?php

require_once("include/Database.php");

$truc = "ok";
$machin = "prout";

echo "blabla$truc\n";

//echo(Database::getInstance()->getString());

$db = Database::getInstance();

if(isset($_SESSION['username']))
{
    // Include de la page du chat
}
else
{
    require("include/connexion.php");
}