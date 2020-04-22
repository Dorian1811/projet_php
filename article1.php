<?php

    session_start();

    if(
        isset($_POST['title']) &&
        isset($_POST['content']) 
    ){

        if(!preg_match('/^.{2,150}$/i', $_POST['title']))
        {
            $errors[] = 'Titre invalide';
        }


        if(!preg_match('/^.{1,20000}$/i', $_POST['content']))
        {
            $errors[] = 'Contenu invalide';
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

            $response = $bdd->prepare('INSERT INTO articles (title, author, create_date, content) VALUES (?, ?, ?, ?) ');

            $response->execute([
                
                $_POST['title'],
                $_POST['author'],
                date('Y-m-d H:i:s'),
                $_POST['content']
                
            
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
        <title>LessWheels - Créations d'articles</title>
    </head>

    <body>

        <?php
            include 'menu.php';
        ?>



        <form action="article1.php" method="GET">
            <div class="container">
                <div class="row">

                    <p class="text-center col-12 mt-5"><a href="articles.php">Retour à la liste des articles</a></p>
                    <h1 class="text-center col-12 pb-3">Ajout d'un nouvelle article</h1>
                    <h1 class="text-center col-12 pr-auto pb-3"><input class="text-center col-10" type="text" name="title" placeholder="Nom du titre"></h1>
                    
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="input-group">
                            <textarea class="form-control " placeholder="écrit ton article !"  rows="20"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <form action="article1.php" method="POST" class="col-12 col-md-6 offset-md-3 my-5">

                <input type="submit" value="Créer" class="btn btn-success col-8 offset-2 my-2">

            </form>
        </form>
        


        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>