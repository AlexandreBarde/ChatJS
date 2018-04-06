<?php
require_once('../include/Database.php');
include("../modeles/UserDAO.php");

function time_elapsed_B($secs){
    $bit = array(
        ' année'        => $secs / 31556926 % 12,
        ' semaine'        => $secs / 604800 % 52,
        ' jour'        => $secs / 86400 % 7,
        ' heure'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' seconde'    => $secs % 60
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
    //$row['timestamp'] = time_elapsed_B($now-$old);
    $row['timestamp'] = $old;
    $tabMess[] = $row;
}

echo json_encode($tabMess);