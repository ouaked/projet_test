<?php
// VERIFIER SI AU MOINS UNE SESSION EST ACTIVE
if (isset($_SESSION['id']))
{
?>
<div class="row">
    <div class="col-12 p-3">
       
        <?php
    if(isset($_POST['modifier']))
    {        
        
        echo "<script>console.log('Je passe bien par la');</script>";
        
        
        // CONNEXION A LA BDD
        include 'connexion_bdd.php';

        $id = $_SESSION['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        // $fonction = $_GET['fonction']; 
        $email = $_POST['email'];

        // REQUETE SQL
        $requete = $bdd -> prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, mail = :mail WHERE id_utilisateur = :id');

        $requete -> bindValue(':nom', $nom);
        $requete -> bindValue(':prenom', $prenom);
        // $requete -> bindValue(':fonction', $fonction);
        $requete -> bindValue(':mail', $email);
        $requete -> bindValue(':id', $id);


        // EXECUTION DE LA REQUETE
        $requete -> execute();
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        // RENVOYER LA DIV AVEC LE MESSAGE DE VALIDATION DE MODIFICATION DU PROJET
        echo '<div class="alert alert-success" role="alert"> Vos informations ont bien été modifiées ! <br />
                            <a href="index.php?page=profil"> Revenir à mon profil </a>
                            </div>';
    }
        ?>

    </div>
</div>

<?php
}
else
{
    // AUCUNE CONNEXION DETECTEE => RENVOI VERS LA PAGE D'ERREUR
    header('location: index.php?page=erreur_blocage');
} 
?>