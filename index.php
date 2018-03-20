<?php

require_once("include/Database.php");

$truc = "ok";
$machin = "prout";

echo "blabla$truc\n";

echo(Database::getInstance()->getString());