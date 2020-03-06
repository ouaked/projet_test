<?php
if(isset($_POST['modifier']))
{
    $id_utilisateur=htmlspecialchars($_POST['id_utilisateur']);
    $cagnotte=htmlspecialchars($_POST['cagnotte']);
    $requete = $bdd -> prepare('UPDATE utilisateur SET cagnotte=:cagnotte WHERE id_utilisateur = :id_utilisateur');
    $requete -> bindValue(':cagnotte', $cagnotte);
    $requete -> bindValue(':id_utilisateur', $id_utilisateur);
    $requete->execute();
    $message="Cagnotte bien mise à jour";
    header("Location:index.php?page=admin&message=$message");
}
else
{
$id_utilisateur=htmlspecialchars($_GET['id_utilisateur']);
$requete =$bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur');
$requete->execute([':id_utilisateur' => $id_utilisateur]);
$donnees=$requete->fetch();
?>
    <div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-lg-6 p-5">
            <form method="POST" action="" id="connexion">
                <div class="row">
                    <div class="col-12 text-left m-5">
                        <legend>
                            <i class="fas fa-users"><?php echo $donnees['nom'];?> <?php echo $donnees['prenom'];?></i>
                        </legend>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cagnotte">Cagnotte</label>
                    <input type="text" class="form-control" name="cagnotte" value="<?php echo $donnees['cagnotte'];?>" /><br/>
                </div>
                <input type="hidden" class="btn-block btn-primary p-2" name="id_utilisateur" value="<?php echo $id_utilisateur;?>"/>
                <input type="submit" class="btn-block btn-primary p-2" name="modifier" value="Modifier"/>
            </form>
        </div>
     </div>
     </div>   
<?php
}