<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/projet_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <title>LessWheels - Location de voiture</title>
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">

            <a href="index.php" class="navbar-brand">LessWheels</a>

            <div id="mainNavbarCollapsible" class="collapse navbar-collapse">

                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>

                    <li class="nav-item"><a class="nav-link" href="articles.php">Articles</a></li>

                    <li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>

                    <li class="nav-item"><a class="nav-link" href="register.php">Inscription</a></li>

                </ul>

                <form class="form-inline my-2 my-lg-0" method="GET" action="">

                    <input class="form-control mr-sm-2" type="text" placeholder="Vous chercher un article ?" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>

                </form>
            </div>
        </nav>

        <div class="container">

            <div class="row">
                <h1 class="text-center col-12 mt-5">Accueil</h1>
                <h2 class="text-center col-12">Bienvenue sur Lesswheels, le premier site qui parle de voitures sans roues !</h2>
                <p class="alert alert-info col-6 offset-3 my-4">Vous pouvez créer des comptes sans problème, seulement ils seront tous "utilisateur". <br>Vous pouvez utiliser le compte suivant pour avoir un compte admin :<br>Email : <strong>admin@exemple.com</strong><br>Mot de passe : <strong>aaaaaaaaA7/</strong></p>
            </div>

            <div class="row">
                <h2 class="col-12 text-center">Les deux derniers articles parus sur le site</h2>

                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header bg-primary text-white">
                            Les voitures sans roues sont très apréciées des écolos
                        </div>

                        <div class="card-body">
                            C'est pas très étonnant ! Lorem ipsum dolor... 
                            <a href="">Lire la suite</a>
                        </div>

                        <div class="card-footer text-muted">
                            Le <strong>lundi 20 avril 2020 à 19h17</strong> par <strong>Alice</strong>
                        </div>
                    </div>

                    <div class="card my-4">
                        <div class="card-header bg-primary text-white">
                            Sortie de la nouvelle Peugeot sans roues
                        </div>

                        <div class="card-body">
                            La nouvelle Peugeot sans roues est enfin sortie ! ... 
                            <a href="">Lire la suite</a>
                        </div>

                        <div class="card-footer text-muted">
                            Le <strong>lundi 20 avril 2020 à 19h16</strong> par <strong>Alice</strong>
                        </div>

                    </div>
        
                </div>





            </div>
        </div>


        <script src="js/popper.min.js"></script>
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
