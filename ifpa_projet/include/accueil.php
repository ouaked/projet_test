<div class="row mt-5 mb-5">
    <div class="col-12 text-center">
        <img src="img/menu.jpg" alt="image-menu" class="w-25">
    </div>
</div>

<?php

$today = getdate(); 

$heure = ($today['hours'] + 2); 
$minute = $today['minutes'];
$jour_txt = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
$jour_semaine = ($today['wday'] - 1);
$jour_mois = $today['mday'];
$mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']; 
$num_mois = ($today['mon'] - 1); 
?>

<div class="row">
    <div class="col-12">
        <div class="alert alert-info text-center" role="alert">
            <?php
            
            if (($heure >= 11))
            {
                $jour_semaine += 1; 
                $jour_mois += 1; 
            ?>
            Il est trop tard pour commander aujourd'hui... <br />
            Votre menu pour le :
            <?php 
                echo $jour_txt[$jour_semaine] . ' ' . $jour_mois . ' ' . $mois[$num_mois];
            }
            else {
            ?>
            Votre menu pour le : 
            <?php 
                echo $jour_txt[$jour_semaine] . ' ' . $jour_mois . ' ' . $mois[$num_mois] . '<br />';
            }
            ?>
        </div>
    </div>
</div>

<div class="row mt-2 mb-2">
    <div class="col-6">
        <div class="row">
            <div class="col-12 mt-2 mb-2">
                <h1 class="menu"> Menu Complet : Entrée + Plat + Dessert</h1>
            </div>
            <div class="col-12 mb-2">
                <h2 class="prix">Prix : 12.50€</h2>
            </div>
        </div>

        <div class="row">
            <?php
            $requete = $bdd -> prepare('SELECT * FROM menu WHERE id_jour = :id LIMIT 2') ;
            $requete -> bindValue(':id', ($jour_semaine + 1));

            $requete -> execute();

            while ($ligne_tab = $requete->fetch())
            {
            ?>
            <div class="col-6 mt-2 mb-2 text-center">
                <h3 class="titre_menu text-left"> <?php echo $ligne_tab['nom'] ?> </h3>
                <p class="contenu_menu text-left">
                    <?php echo $ligne_tab['detail'] ?>
                </p>

                <?php
                if(isset($_SESSION['mail']))
                {
                ?>
                <a href="index.php?page=panier&id_menu=<?php echo $ligne_tab['id_menu'] ?>" class="btn btn-outline-info mt-2"> <i class="fas fa-cart-plus"></i> </a>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="col-6">
        <div class="row">
            <div class="col-12 mt-2 mb-2">
                <h1 class="menu"> Menu Light : Entrée + Plat / Plat + Dessert</h1>
            </div>
            <div class="col-12 mb-2">
                <h2 class="prix">Prix : 8.50€</h2>
            </div>
        </div>

        <div class="row">
            <?php
            $requete = $bdd -> prepare('SELECT * FROM menu WHERE id_jour = :id LIMIT 2,2') ;
            $requete -> bindValue(':id', ($jour_semaine + 1));

            $requete -> execute();

            while ($ligne_tab = $requete->fetch())
            {
            ?>
            <div class="col-6 mt-2 mb-2 text-center">
                <h3 class="titre_menu text-left"> <?php echo $ligne_tab['nom'] ?> </h3>
                <p class="contenu_menu text-left">
                    <?php echo $ligne_tab['detail'] ?>
                </p>
                <?php
                if(isset($_SESSION['mail']))
                {
                ?>
                <a href="index.php?page=panier&id_menu=<?php echo $ligne_tab['id_menu'] ?>" class="btn btn-outline-info mt-2"> <i class="fas fa-cart-plus"></i> </a>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>