<?php 
function Menu_jour($jour)
{
    include("connexion_bdd.php");
    $requete=$bdd->prepare("SELECT * FROM menu WHERE id_jour=$jour");
    $requete->execute();
    if($requete->rowCount()!=0)
    {
    while($donnees=$requete->fetch())
        {
        ?>
        <td><?php echo $donnees['nom'];?></td>
        <?php 
        }
     echo "  <td><a href=\"index.php?page=modifier_menu_jour&id_jour=$jour\"><i class=\"fas fa-edit\"></i></a></td>";
    }
    else
    {
        echo"<td>pas de menu</td><td>pas de menu</td><td>pas de menu</td><td>pas de menu</td><td><a href=\"index.php?page=ajouter_menu_jour&id_jour=$jour\"><i class=\"fas fa-plus-square\"></i></a></td>";
    }
}
?>
<div class="container">
<?php
        if(isset($_GET['message']))
        {?>
        <div class="alert alert-warning mt-5">
        <p><?php echo $_GET['message'];?></p>
        </div>
        <?php
        }
        ?>
    <div class="row pt-5">
        <div class="col-12 col-lg-6">
            <h3>Menu de la semaine</h3>
            <table class="table">
         <thead class="thead-light">
            <tr>
                <th scope="col">Jour</th>
                <th scope="col">Menu 1</th>
                <th scope="col">Menu 2</th>
                <th scope="col">Menu 3</th>
                <th scope="col">Menu 4</th>
                <th scope="col">Modifier</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Lundi</td>
                <?php echo Menu_jour(1);?>
                
            </tr>
            <tr>
                <td>Mardi</td>
                <?php echo Menu_jour(2);?>
                
            </tr>
            <tr>
                <td>Mercredi</td>
                <?php echo Menu_jour(3);?>
                
            </tr>
            <tr>
                <td>Jeudi</td>
                <?php echo Menu_jour(4);?>
               
            </tr>
            <tr>
                <td>Vendredi</td>
                <?php echo Menu_jour(5);?>
                
            </tr>
        </tbody>
        </table>
        </div>
        <div class="col-12 col-lg-6">
            <h3>Commande à preparer</h3>
            <table class="table">
         <thead class="thead-light">
            <tr>
                <th scope="col">Detail</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Annuler</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $date=date('Y-m-j');
            $requete=$bdd->prepare("SELECT * FROM commande INNER JOIN utilisateur on utilisateur.id_utilisateur=commande.id_utilisateur WHERE etat=1 and date_commande='$date'");
            $requete->execute();
            
            while($donnees=$requete->fetch())
            {
                $id_commande=$donnees['id_commande'];
                $requete2=$bdd->prepare("SELECT * FROM commande INNER JOIN ligne_commande ON commande.id_commande=ligne_commande.id_commande INNER JOIN menu ON ligne_commande.id_menu=menu.id_menu WHERE commande.id_commande=$id_commande");
                $requete2->execute();
                $detail='';
                while($donnees2=$requete2->fetch())
                {
                    $detail=$detail.'/'.$donnees2['nom'];
                   
                }
                ?>
                <tr>
                    <td><?php echo $detail;?></td>
                    <td><?php echo $donnees['nom'];?> <?php echo $donnees['prenom'];?></td>
                    <td><?php echo $donnees['prix'];?></td>
                    <td><a href="index.php?page=annuler_commande&id_commande=<?php echo $id_commande;?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        </div>
    </div>
    <div class="row pt-5">
       
        <div class="col-12 col-lg-6">
        <h3 class="text-center">Modifier les cagnottes</h3>
        <table class="table">
         <thead class="thead-light">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Mail</th>
                <th scope="col">Cagnotte</th>
                <th scope="col">Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $requete=$bdd->prepare("SELECT *  FROM utilisateur");
            $requete->execute();
            while($donnees=$requete->fetch())
            {
            $id_utilisateur=$donnees['id_utilisateur'];
            ?>
            <tr>
                <td><?php echo $donnees['nom'];?></td>
                <td><?php echo $donnees['prenom'];?></td>
                <td><?php echo $donnees['mail'];?></td>
                <td><?php echo $donnees['cagnotte'];?></td>
                <td><a href="index.php?page=modifier_cagnotte&id_utilisateur=<?php echo $id_utilisateur;?>"><i class="fas fa-edit"></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
        </div>
        
        <div class="col-12 col-lg-6">
        <h3 class="text-center">Les menus</h3>
        <h5 class="text-center"><a href="index.php?page=ajouter_menu"><i class="fas fa-plus-square"></i> Ajouter un menu</a></h5>
        <table class="table">
         <thead class="thead-light">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Détail</th>
                <th scope="col">Prix</th>
                <th scope="col">Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $requete=$bdd->prepare("SELECT *  FROM menu");
            $requete->execute();
            while($donnees=$requete->fetch())
            {
            $id_menu=$donnees['id_menu'];
            ?>
            <tr>
                <td><?php echo $donnees['nom'];?></td>
                <td><?php echo $donnees['detail'];?></td>
                <td><?php echo $donnees['prix'];?></td>
                <td><a href="index.php?page=modifier_menu&id_menu=<?php echo $id_menu;?>"><i class="fas fa-edit"></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
        </div>
    </div>
   
</div>