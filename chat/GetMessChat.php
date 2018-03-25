<?php
require_once('../include/Database.php');
include("../modeles/UserDAO.php");

function time_elapsed_B($secs){
    $bit = array(
        ' year'        => $secs / 31556926 % 12,
        ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60
    );

    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
    }
    array_splice($ret, count($ret)-1, 0, 'et');
    $ret[] = '';

    return join(' ', $ret);
}

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
    $old = $row['timestamp'];
    $now = time();
    $row['timestamp'] = time_elapsed_B($now-$old);
    $tabMess[] = $row;
}

echo json_encode($tabMess);