<?php
// VERIFIER SI AU MOINS UNE SESSION EST ACTIVE
if (isset($_SESSION['mail']))
{
?>
<div class="card mt-4 mb-4">
    <div class="card-body mt-2 mb-1">
        <div class="alert alert-info text-center" role="alert">
            Vous êtes connecté en tant que <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> <br />
            Si ce n'est pas vous : <a href="index.php?page=deconnexion"> <i class="fas fa-user-times fa-2x p-3"></i> </a>
        </div>
    </div>
</div>

<div class="row text_choix text-center d-flex align-items-center mt-4 mb-4">
    <div class="col-6">   
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pt-2 pb-2"> <a href="index.php?page=info_perso">Mes informations personnelles </a> </h5>
            </div>
        </div>         
    </div>

    <div class="col-6">
        <div class="row"> 
            <?php
 // CONNEXION A LA BDD
 include 'include/connexion_bdd.php';

 // DEFINIR LA RECHERCHE AVEC LE MAIL DE L'UTILISATEUR
 $recherche = trim($_SESSION['mail']);

 // REQUETE SQL
 $requete = $bdd -> prepare('SELECT * FROM utilisateur WHERE mail = :mail') ;
 $requete -> bindValue(':mail', $recherche);

 // EXECUTION DE LA REQUETE
 $requete -> execute();

 // AFFICHER LE FORMULAIRE DU PROJET SI RECUPERE DES DONNES
 if ($ligne_tab = $requete->fetch())
 {
            ?>
            <div class="col-6 d-flex align-items-center">
                <h5 class="solde pl-5"> Solde disponible : </h5>
            </div>

            <div class="col-6">
                <label for="cagnotte" class="form-control text-center p-3"> <?php echo $ligne_tab['cagnotte'] . ' €'; ?> </label>
            </div>
            <?php
 }
            ?>
        </div>
    </div>
</div>


<div class="row text_choix text-center d-flex align-items-center mt-4 mb-4">
    <div class="col-6">   
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pt-2 pb-2"> <a href="index.php?page=commandes_en_cours">Mes commandes en cours </a> </h5>
            </div>
        </div>         
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pt-2 pb-2"> <a href="index.php?page=commandes_anterieures"> Mes commandes passées </a> </h5>
            </div>
        </div> 
    </div>
</div>
<div class="row text_choix text-center d-flex align-items-center mt-4 mb-4">
    <?php 
 $requete =$bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
 $mail=$_SESSION['mail'];
 $requete->execute([':mail' => $mail]);
 $donnees=$requete->fetch();
 if($donnees['role']==1)
 {
    ?>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pt-2 pb-2"> <a href="index.php?page=admin"> Administration </a> </h5>
            </div>
        </div> 
    </div>
    <?php
 }?>
</div>
<?php
}
else
{
    // Il n'existe pas de connexion, on renvoie vers la page d'erreur
    header('location: index.php?page=erreur_blocage');
} 
?>