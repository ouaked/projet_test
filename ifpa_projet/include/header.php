<?php 
session_start();// on démarre la session
include 'include/connexion_bdd.php';
?>


<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

        <link rel="stylesheet" href="css/cbl_css_projet.css">
        <link rel="stylesheet" href="css/bo_css_projet.css">
        <link rel="stylesheet" href="css/xj_css_projet.css">

        <title>IFPA</title>
    </head>

    <body>

        <div class="container-fluid header text_menu">
            <div class="row">
                <div class="col-1 text-center">
                    <img src="img/logo_02.png" alt="" class="logo_menu">
                </div>

                <div class="col-6 d-flex justify-content-around align-items-center">
                    <a href="index.php?page=accueil"> Accueil </a>
                    <a href="index.php?page=menu_semaine"> Menu de la semaine </a>
                

                    <?php
                    if (isset($_SESSION['mail']))
                    {
                    ?>
                    <a href="index.php?page=panier"> Panier </a>
                    <a href="index.php?page=profil"> Mon profil </a>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-3">
                    &nbsp;
                </div>

                <?php
                if (isset($_SESSION['mail']))
                {
                ?>
                <div class="col-2 d-flex align-items-center text-right">
                    <a href="index.php?page=deconnexion"> <i class="fas fa-sign-out-alt fa-2x p-3"></i> </a>
                </div>
                <?php 
                }
                else {
                ?>
                <div class="col-2 d-flex align-items-center text-right">
                    <a href="index.php?page=connexion"> <i class="fas fa-sign-in-alt fa-2x p-3"></i> </a>
                </div>

                <?php
                }
                ?>

            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>
