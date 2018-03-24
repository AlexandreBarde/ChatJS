<?php
$linkpdo = new PDO('mysql:host=localhost;dbname=brb2528a','brb2528a','A4dkhmyB');
$rq = "SELECT * FROM `message` ORDER by Timestamp desc LIMIT 10";
$res = $linkpdo -> prepare($rq);
$res -> execute();
$tabMess = array();
$tabMess = $res -> fetchAll(PDO::FETCH_ASSOC);
$rqBis = "SELECT * FROM `gens`";
$resBis = $linkpdo -> prepare($rqBis);
$resBis -> execute();
$tabNom = $resBis -> fetchAll(PDO::FETCH_ASSOC);
$i=0;
$j=0;

for($i;$i<sizeof($tabMess);$i++){
    $tmp = $tabMess[$i]['ID_Gens'];
    for($j;$j<sizeof($tabNom);$j++){
        if ($tmp == $tabNom[$j]['Id_Gens']){
            $tabMess[$i]['ID_Gens'] = $tabNom[$j]['Nom'];
        }
    }
    $j=0;
}
$FicJSON = json_encode($tabMess);
echo $FicJSON;