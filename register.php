<?php

    require '../recaptchavalid.php';

    session_start();

    if(
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['confirm-password']) &&
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['g-recaptcha-response'])
    ){

        if(!filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL))
        {
            $error[] = 'Email invalide';
        }

        if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#$%&\'()*+,\-\.\/:;<=>?\\\\@[\]\^_`{|}~]).{8,1000}$/', $_POST['password']))
        {
            $errors[] = 'Mot de passe doit contenir minimum 1 maj, 1 min, 1 chiffre et un caractere special !';
        }

        if($_POST['confirm-password'] != $_POST['password']) 
        {
            $errors[] = 'Confirmation de mot de passe différente';
        }

        if(!preg_match('/^.{2,50}$/i', $_POST['firstname']))
        {
            $errors[] = 'Prénom invalide';
        }

        if(!preg_match('/^.{2,50}$/i', $_POST['lastname']))
        {
            $errors[] = 'Nom invalide';
        }

        if(!recaptcha_valid($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']))
        {
            $errors[] = 'Captcha invalide';
        }

        if(!isset($errors))
        {
            $successMessage = 'Formulaire envoyé !';
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

            $response = $bdd->prepare('INSERT INTO users (email, password, firstname, lastname, register_date) VALUES (?, ?, ?, ?, ?) ');

            $response->execute([
                
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_BCRYPT),
                $_POST['firstname'],
                $_POST['lastname'],
                date('Y-m-d H:i:s')
            
            ]);

            if($response->rowCount() > 0)
            {
                $successMessage = 'La donnée a bien été créé !';
            }else {
                $errors[] = 'Problème avec la base de données, veuillez ré-essayer';
            }

            $response->closeCursor();

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
        <title>LessWheels - Inscription</title>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>

    <body>

        <?php
            include 'menu.php';
        ?>



        <?php
            if(isset($errors))
            {
                foreach($errors as $error)
                {
                    echo '<p style="color:red;">' . $error . '</p>';
                } 
            }

            if(isset($successMessage))
            {
                echo '<p style="color:green;">' . $successMessage . '</p>';
            } else {
        ?>

        <div class="container">
            <div class="row">
                <h1 class="text-center col-12 mt-5">Inscription</h1>
            </div>

            <form action="register.php" method="POST" class="col-12 col-md-6 offset-md-3 my-5">

                <div class="form-group">

                    <label for="email">Email</label>
                    <input type="email" value="" class="form-control" name="email" placeholder="alice@exemple.com">

                </div>

                <div class="form-group">

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control">

                </div>

                <div class="form-group">

                    <label for="confirm-password">Confirmation du mot de passe</label>
                    <input type="password" name="confirm-password" class="form-control">

                </div>

                <div class="form-group">

                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" value="" class="form-control" placeholder="Alice">

                </div>

                <div class="form-group">

                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" value="" class="form-control" placeholder="dupond">

                </div>

                <div class="form-group">

                    <div class="g-recaptcha" data-sitekey="6LdbwusUAAAAAHDPp4WNb2kKO_kf5LdI0cSVD38t"></div>

                </div>

                <input type="submit" value="M'inscrire" class="btn btn-success col-12 my-2">

            </form>
        </div>

        <?php
        }
        ?>

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
