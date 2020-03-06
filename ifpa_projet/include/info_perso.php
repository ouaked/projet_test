<?php
// VERIFIER SI AU MOINS UNE SESSION EST ACTIVE
if (isset($_SESSION['id']))
{
    // DEFINIR LA RECHERCHE AVEC L'ID DU PROJET
    $recherche = trim($_SESSION['id']);

    include 'include/connexion_bdd.php';

    // REQUETE SQL
    $requete = $bdd -> prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id') ;
    $requete -> bindValue(':id', $recherche);

    // EXECUTION DE LA REQUETE
    $requete -> execute();

    // AFFICHER LE FORMULAIRE DU PROJET SI RECUPERE DES DONNEES
    if ($ligne_tab = $requete->fetch())
    {
?>

<div class="row mt-5 mb-5">
    <div class="col-12">
        <h3 class="text-center info_perso"> <i class="fas fa-user-edit p-3"></i> Mes informations personnelles </h3>
    </div>
</div>

<form action="index.php?page=update_info" method="post" class="border border-secondary rounded mb-5">
    <div class="row mt-4">
        <div class="col-12" hidden>
            <label for="id_utilisateur"> Id_utilisateur </label>
            <input type="text" class="form-control" name="id_utilisateur" value=" <?php echo $_SESSION['id']; ?> ">
        </div>
    </div>

    <div class="row p-3">
        <div class="col-2"> 
            <label for="nom"> Nom : </label>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" name="nom" value="<?php echo $ligne_tab['nom'] ?>" required>
        </div>
    </div>

    <div class="row p-3">
        <div class="col-2"> 
            <label for="prenom"> Prénom : </label>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" name="prenom" value="<?php echo $ligne_tab['prenom'] ?>" required>
        </div>
    </div>

<!--
    <div class="row p-3 d-flex align-items-center">
        <div class="col-2"> 
            <label for="fonction">Fonction : </label>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" name="fonction" value="<?php echo $ligne_tab['fonction'] ?>" required>
        </div>
        <div class="col-4">
            <h4 class="text-info texte_fonction"> Ex: stagiaire, professeur ou visiteur </h4>
        </div>
    </div>
-->

    <div class="row p-3">
        <div class="col-2"> 
            <label for="email"> Email : </label>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" name="email" value="<?php echo $ligne_tab['mail'] ?>" required>
        </div>
    </div>

    <div class="row p-3 d-flex align-items-center">
        <div class="col-3 text-center">
            <a href="index.php?page=profil"> <i class="fas fa-reply fa-3x"></i> </a>
        </div>
        <div class="col-3"> 
            <button type="submit" name="modifier" class="btn btn-warning m-5">Modifier les info</button>
        </div>
    </div>
</form>

<?php 
    }
}
else
{
    // AUCUNE CONNEXION DETECTEE, REDIRECTION VERS LA PAGE DE BLOCAGE
    header('location: index.php?page=erreur_blocage');
} 
?>