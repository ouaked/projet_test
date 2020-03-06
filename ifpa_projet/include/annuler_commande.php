 <?php
    $id_commande=htmlspecialchars($_GET['id_commande']);
    $requete=$bdd->prepare("UPDATE commande SET etat=0 WHERE id_commande=$id_commande");
    $requete->execute();
    $requete2=$bdd->prepare("SELECT * FROM commande WHERE id_commande=$id_commande");
    $requete2->execute();
    $donnees2=$requete2->fetch();
    $prix=$donnees2['prix'];
    $id_utilisateur=$donnees2['id_utilisateur'];
    $requete3=$bdd->prepare("UPDATE utilisateur SET cagnotte=cagnotte+$prix WHERE id_utilisateur=$id_utilisateur");
    $requete3->execute();
    $message="la commande a bien été annulée";
    header("Location:index.php?page=admin&message=$message");
?>
