<?php
session_start();
include("../modeles/Message.php");
include("../modeles/UserDAO.php");
include("../modeles/MessageDAO.php");

//Récuparation de la connexion à la BD
$db = Database::getInstance();

//Création de l'objet Message basique
$message = new Message();
$message->setContenu($_GET['message']);
$message->setTimestamp();

//Création d'un userDAO pour recup l'id de l'utilisateur qui envoi le message
$userDAO = new UserDAO($db);
$id = $userDAO->getByPseudo($_SESSION['username']);

//Création de l'utilisateur avec le bon id
$user = new User();
$user->setIdUser($id);

//Ajout user au message
$message->setUser($user);

//Création du messageDAO avec la BD a qui on passe le message d'avant et on l'enregistre
$messageDao = new MessageDAO($db);
$messageDao->setMessage($message);
$i = $messageDao->saveMessage();