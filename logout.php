<?php 

    require 'function.php';

    session_start();

    if(isConnected())
    {
        unset($_SESSION['user']);

        $success = true;
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/projet_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <title>LessWheels - Déconnexion</title>
    </head>
    
    <body>

        <?php
            include 'menu.php';
        ?>


        <div class="container">
            <div class="row">
                <h1 class="text-center col-12 mt-5">Déconnexion</h1>
            </div>
        </div>

        <?php

            if(isset($success)){
                
                echo'<p class="alert alert-success col-8 offset-2" style="color:green;">Vous avez bien été déconnecté !<a href="index.php">Cliquez ici pour revenir à l\'accueil</a></p>';
                
            }else {
                
                echo'<p style="color:red;">Vous êtes déjà connecté !</p>';

            }

        ?>


        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>