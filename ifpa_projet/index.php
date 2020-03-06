<?php
include("include/header.php");

// on inclut la connexion a la bdd
include("include/connexion_bdd.php");

echo"<div class=\"container page\">"; 

if (!empty($_GET['page']) && is_file('include/'.$_GET['page'].'.php'))
{
    include 'include/'.$_GET['page'].'.php';
}
//SINON ON AFFICHE L ACCUEIL
else
{
    include 'include/accueil.php';
} 
echo"</div>";
?>

<?php 
include("include/footer.php");
?>

