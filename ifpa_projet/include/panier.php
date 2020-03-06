<?php
    if(isset($_GET['id_menu']))
    {
    $requete = $bdd->prepare("SELECT * FROM menu WHERE id_menu=:id_menu ");
    $requete->bindValue(':id_menu', $_GET['id_menu']);
    $requete->execute();
    $donnees=$requete->fetch();
    $prix=$donnees['prix'];
    $date_commande=date('Y-m-j');
    $etat=1;
    $id_utilisateur=$_SESSION['id'];
    $requete_cagnotte=$bdd->prepare("SELECT cagnotte FROM utilisateur WHERE id_utilisateur=$id_utilisateur");
    $requete_cagnotte->execute();
    $data=$requete_cagnotte->fetch();
    $cagnotte=$data['cagnotte'];
    $somme=$cagnotte-$prix;
    if($somme>0)
    {
    $requete2=$bdd->prepare("INSERT INTO commande (date_commande,id_utilisateur,id_menu,prix,etat) VALUES (:date_commande,:id_utilisateur,:id_menu,:prix,:etat)");
    $requete2->bindValue(':date_commande', $date_commande);
    $requete2->bindValue(':id_utilisateur', $id_utilisateur);
    $requete2->bindValue(':id_menu', $_GET['id_menu']);
    $requete2->bindValue(':prix', $prix);
    $requete2->bindValue(':etat', $etat);
    $requete2->execute();
    $requete3=$bdd->prepare("UPDATE utilisateur SET cagnotte=cagnotte-$prix WHERE id_utilisateur=$id_utilisateur");
    $requete3->execute();
   
                echo "<div class=\"alert alert-info\">";
                echo "Votre panier a été validé,pour voir votre commande cliqueé  <a href=\"index.php?page=commande_encours\"/>ici</a>";
                echo "</div>";       
    
    }
    else
    {
        echo "<div class=\"alert alert-info\">";
                echo "T as plus de tune mon con va voir la cantinière";
                echo "</div>";   
    }
        }
    else{
        echo "<div class=\"alert alert-info\">";
        echo "Votre panier est vide";
        echo "</div>";
    }
		

		
		
?>






