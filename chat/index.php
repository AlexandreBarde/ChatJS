<?php

session_start();

if(!isset($_SESSION['username']))
{
    $_SESSION['erreur'] = 2;
    header("Location: ../");
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous"><title>ChatJS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
    <body>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">ChatJS</a>
        <span id="username" class="navbar-text"><?= $_SESSION['username'] ?></span>
        <a href="destroy.php"><button type="button" class="btn btn-outline-danger">Se déconnecter</button></a>
    </nav>
    <br />
    <div class="container">
        <div class="card-deck">
            <div class="card">
                <h5 class="card-header">Derniers messages du chat</h5>
                <div id="affichage" class="card-body" style="height : 500px; overflow-y:scroll">
                    <div id="affichageFin"></div>
                </div>
                <div id="affichage" class="card-body">
                    <form class="form-row">
                        <div class="col-10">
                            <label class="sr-only" for="inlineFormInputName2">Message</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Votre message">
                        </div>
                        <div class="col">
                            <button id="boutonSubmit" type="submit" class="btn btn-primary mb-2">Envoyer</button>
                            <span style="color: red" id="erreur"> </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Utilisateurs (2)</h5>
                <div class="card-body">
                    <p class="card-text">
                        <p>Utilisateur 1</p>
                        <div class="dropdown-divider"></div>
                        <p>Utilisateur 2</p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="ScriptJS.js"></script>
    </body>
</html>