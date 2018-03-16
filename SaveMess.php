<?php
$linkpdo = new PDO('mysql:host=localhost;dbname=brb2528a','brb2528a','A4dkhmyB');
$ts = time();
$rq = 'INSERT INTO message(TimeStamp,ID_Gens,Message) VALUES("'.$ts.'",(SELECT ID_Gens FROM Gens WHERE nom ="'.$_GET["auteur"].'"),"'.$_GET["message"].'")';
$res = $linkpdo -> prepare($rq);
$res -> execute();