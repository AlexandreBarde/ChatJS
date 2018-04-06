<?php

require("../modeles/UserDAO.php");
require_once('../include/Database.php');

session_start();

$db = Database::getInstance();

$pseudo = $_SESSION['username'];

$userDAO = new UserDAO($db);
$user = new User();
$user->setPseudo("Krown0s");

$userDAO->setConnected($pseudo);

$co = $db->getConnection();
$rq = "SELECT * FROM `compte` WHERE timestamp_connexion > " . time() . " ORDER BY pseudo";
$res = $co -> prepare($rq);
$res -> execute();

while($data = $res->fetch())
{
    echo $data['pseudo'] . " ";
}

