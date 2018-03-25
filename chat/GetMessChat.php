<?php
require_once('../include/Database.php');
include("../modeles/UserDAO.php");


$db = Database::getInstance();
$co = $db->getConnection();
$rq = "SELECT * FROM `message` ORDER BY id_message DESC LIMIT 10 ";
$res = $co -> prepare($rq);
$res -> execute();
$tabMess = array();

$userDAO = new UserDAO($db);

$data = $res -> fetchAll();
foreach($data as $row){
    $tmp = $userDAO->getById($row['id_compte']);
    $row['id_compte'] = $tmp;
    $tabMess[] = $row;
}

echo json_encode($tabMess);