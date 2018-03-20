<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
        <h2 class="text-center display-4">Veuillez vous connecter pour accéder à l'application</h2>
        <div class="container" id="auth">
            <div class="row">
                <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4">
                    <form action="include/checkco.php" method="post">
                        <div class="form-group">
                            <input required class="form-control" type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                        </div>
                        <div class="form-group">
                            <input required class="form-control" type="password" name="password" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="login" type="submit">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

