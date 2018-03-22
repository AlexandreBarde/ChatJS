<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
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
    <title>ChatJS</title>
</head>
    <body>
    <br />
    <div class="container">
        <div class="card">
            <h5 class="card-header">Derniers message du chat</h5>
            <div class="card-body">
                <h5 class="card-title">Pseudo 1</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet congue ipsum. Fusce at pretium nulla, eget vulputate urna. In maximus augue orci, eu gravida metus dignissim et. Nullam euismod cursus pretium. Curabitur quis porta ante. Proin eros magna, euismod in dictum et, vestibulum vel erat. Etiam commodo sapien in viverra ultricies. Nulla sapien odio, eleifend id ipsum vel, accumsan tristique lectus.</p>
                <small class="form-text text-muted">Il y a 25 minutes et 30 secondes</small>
                <div class="dropdown-divider"></div>
                <h5 class="card-title">Pseudo 2</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet congue ipsum. Fusce at pretium nulla, eget vulputate urna. In maximus augue orci, eu gravida metus dignissim et. Nullam euismod cursus pretium. Curabitur quis porta ante. Proin eros magna, euismod in dictum et, vestibulum vel erat. Etiam commodo sapien in viverra ultricies. Nulla sapien odio, eleifend id ipsum vel, accumsan tristique lectus.</p>
                <small class="form-text text-muted">Il y a 10 minutes</small>
                <div class="dropdown-divider"></div>
                <h5 class="card-title">Pseudo 3</h5>
                <p class="card-text">Ceci est un message court.</p>
                <small class="form-text text-muted">Il y a 30 secondes</small>
                <div class="dropdown-divider"></div>
                <form class="form-row">
                    <div class="col-11">
                        <label class="sr-only" for="inlineFormInputName2">Message</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Votre message">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>