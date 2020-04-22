<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/projet_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <title>LessWheels - Articles</title>
    </head>

    <body>

        <?php
            include 'menu.php';
        ?>

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
                                <a href="">(Titre)</a>
                            </td>

                            <td class="col-2">(Auteur)</td>
                                        
                            <td class="col-3">(Date de parution)</td>

                        </tr>

                        <tr>
                            <td class="col-6">                                      
                                <a href="">(Titre)</a>
                            </td>

                            <td class="col-2">(Auteur)</td>
                                        
                            <td class="col-3">(Date de parution)</td>

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