<?php
$linkpdo = new PDO('mysql:host=localhost;dbname=brb2528a','brb2528a','A4dkhmyB');
$ts = time();
$rq = 'INSERT INTO message(timeStamp,id_compte,contenu) VALUES("'.$ts.'",(SELECT id_compte FROM compte WHERE pseudo ="'.$_GET["auteur"].'"),"'.$_GET["message"].'")';
$res = $linkpdo -> prepare($rq);
$res -> execute();
