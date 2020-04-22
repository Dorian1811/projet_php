<?php

    require 'function.php';

    session_start();

    if(!isConnected())
    {
        
        if(
            isset($_POST['email']) &&
            isset($_POST['password'])
        ){
            if(!filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL))
            {
                $error[] = 'Email invalide';
            }

            if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#$%&\'()*+,\-\.\/:;<=>?\\\\@[\]\^_`{|}~]).{8,1000}$/', $_POST['password']))
            {
                $errors[] = 'Mot de passe doit contenir minimum 1 maj, 1 min, 1 chiffre et un caractere special !';
            }


            if(!isset($errors))
            {

                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=projet_php;charset=utf8', 'root', '');
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                }catch (Exception $e){

                    die('Il y a un problème avec le bdd : ' . $e->getMessage());

                }

                $response = $bdd->prepare("SELECT * FROM users WHERE email = ?");

                $response->execute([
                    $_POST['email']
                ]);

                $user = $response->fetch(PDO::FETCH_ASSOC);

                // Verif si compte existe
                if(empty($user)){
                    $errors[] = 'Ce compte n\'existe pas !';
                } else {

                    // Verif du mot de passe
                    if(!password_verify($_POST['password'], $user['password'])){
                        $errors[] = 'Mauvais mot de passe !';
                    } else {

                        $successMessage = '<p class="alert alert-success col-12">Connexion réussi !<a href="index.php"> Cliquez ici</a> pour revenir à l\'accueil</p> ';

                        // Stockage des infos de l'utilisateur en session
                        $_SESSION['user'] = $user;

                    }

                }

                $response->closeCursor();

            }

        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/projet_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <title>LessWheels - Connexion</title>
    </head>

    <body>

        <?php
            include 'menu.php';
        ?>


        <div class="container">
            <div class="row">
                <h1 class="text-center col-12 mt-5">Connexion</h1>
            </div>


            <?php

                if(isset($errors))
                {
                    foreach($errors as $error)
                    {
                        echo'<p style="color:red;"> ' . $error . '</p>';
                    }
                }

                if(isset($successMessage))
                {
                    echo'<p style="color:green;">' . $successMessage . '</p>';
                }else {

                    if(!isConnected()){
            ?>        

                <div class="row">

                    <form action="login.php" method="POST" class="col-12 col-md-6 offset-md-3 my-5">

                        <div class="form-group">

                            <label for="email">Email</label>
                            <input type="email" value="" class="form-control" name="email" placeholder="alice@exemple.com">

                        </div>

                        <div class="form-group">

                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control">

                        </div>

                        
                        <input type="submit" value="Connexion" class="btn btn-success col-12 my-2">

                    </form>

                </div>    
        </div>
                <?php

                    }else{
                            
                        echo'<p style="color:red;">Vous êtes déjà connecté !</p>';
                        
                    }
                }

                ?>


        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
