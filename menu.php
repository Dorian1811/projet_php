
<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <div id="mainNavbarCollapsible" class="collapse navbar-collapse">

        <a href="index.php" class="navbar-brand">LessWheels</a>

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>

            <li class="nav-item"><a class="nav-link" href="articles.php">Articles</a></li>


            <?php
                if(isset($_SESSION['user'])){
                    ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>

                    <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
                    <?php
                }else {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Connexion</a></li>

                    <li class="nav-item"><a class="nav-link" href="register.php">Inscription</a></li>
                    <?php 
                }
                
                if(isset($_SESSION['user']['admin'])){
                    ?>

                    <li class="nav-item"><a class="nav-link" href="article1.php">Admin</a></li>
                    <?php
                }
            ?>

        </ul>

        <form class="form-inline my-2 my-lg-0" method="GET" action="">

            <input class="form-control mr-sm-2" type="text" placeholder="Vous chercher un article ?" name="query">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                <i class="fas fa-search"></i>
            </button>

        </form>
    </div>
</nav>