<?php

    require 'function.php';

    session_start();


    if(!isConnected())
    {

        if(
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email'])
        ){
                
            if(!isset($errors))
            {
                $_SESSION["users"] = array(
                    'firstname' => $_POST["firstname"],
                    'lastname' => $_POST["lastname"],
                    'email' => $_POST['email']
                );
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

                $response = $bdd->prepare("SELECT * FROM users WHERE name = ?");

                $users = $response->fetchAll(PDO::FETCH_ASSOC);

                $response->execute([
                    
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $_POST['email']
                ]);

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
        <title>LessWheels - Profil</title>
    </head>

    <body>

        <?php
            include 'menu.php';
        ?>

        <?php
            if(!isset($_SESSION['user']))
            {
                echo 'Vous devez vous connecter pour être ici !';
            }else{
                ?>

                <h1 class="text-center col-12 mt-5">Profil</h1>

                <div class="row">
                    <div class=" col-6 offset-3">
                        <ul class="list-group">
                            <li class="list-group-item"><?php echo'Prénom : ' . htmlspecialchars($_SESSION['user']["firstname"]); ?></li>
                            <li class="list-group-item"><?php echo'Nom : ' . htmlspecialchars($_SESSION['user']["lastname"]); ?></li>
                            <li class="list-group-item"><?php echo'Email : '  . htmlspecialchars($_SESSION['user']["email"]); ?></li>
                            <li class="list-group-item"><?php ?></li>
                            <li class="list-group-item"><?php ?></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>


        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
