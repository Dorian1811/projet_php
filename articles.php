<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/projet_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <title>LessWheels - Inscription</title>
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">

            <a href="index.php" class="navbar-brand">LessWheels</a>

            <div id="mainNavbarCollapsible" class="collapse navbar-collapse">

                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>

                    <li class="nav-item active"><a class="nav-link" href="articles.php">Articles</a></li>

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
                <h1 class="text-center col-12 mt-5">Liste des articles</h1>
            </div>

            <div class="row">
                <table class="table table-hover col-12 mt-4">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Date de parution</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="col-6">                
                                <a href="article1.php">Les voitures sans roues s...</a>
                            </td>

                            <td class="col-2">Alice</td>
                                        
                            <td class="col-3">lundi 20 avril 2020 à 19:17:33</td>

                        </tr>

                        <tr>
                            <td class="col-6">                                      
                                <a href="article2.php">Sortie de la nouvelle Peu...</a>
                            </td>

                            <td class="col-2">Alice</td>
                                        
                            <td class="col-3">lundi 20 avril 2020 à 19:16:00</td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>



        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>