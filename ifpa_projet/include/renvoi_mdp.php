<?php 
if(isset($_POST['envoyer']))
{
    $mail=htmlspecialchars(trim($_POST['mail']));
    $requete =$bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
    $requete->execute([':mail' => $mail]);
    if($donnees=$requete->fetch())
    {   
        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $mdp = str_shuffle($char);
        $mdp = substr($mdp,0,6);
        $message="Votre nouveau mot de passe est $mdp";
        //NE MARCHE PAS 
        //mail($mail, 'Nouveau mot de passe', $message);
        $mdp=password_hash($mdp, PASSWORD_DEFAULT);
        $requete=$bdd->prepare("UPDATE utilisateur SET mdp='$mdp' WHERE mail='$mail'");
        $requete->execute();
        echo "<div class=\"alert alert-warning\">";
        echo "Votre mdp à été réinitailisé,$message";
        echo "</div>";
    }
    else
    {
        $erreur="Cet email n'existe pas";
        header("Location:index.php?page=renvoi_mdp&erreur_email=$erreur");	
    }
}
else
{
 ?>
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-12 p-5">
                <form method="POST" action="" id="connexion">
                    <div class="row">
                        <div class="col-12 text-left m-5">
                            <legend>
                                <i class="fas fa-users">Renvoyer un mot de passe</i>
                            </legend>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email_connexion">Email</label>
                        <input type="text" class="form-control" name="mail" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];}?>" placeholder="Entrer votre email"/><br/>
                        <small id="email_connexion_alert" class="alert alert-danger">Veuillez rentrer votre email</small>
                        <?php if(isset($_GET['erreur_email']))
                        {
                        ?>
                        <div class="alert alert-danger"><?php echo $_GET['erreur_email'];?></div>
                        <?php
                         }
                        ?>
                    </div>
                    <input type="submit" class="btn-block btn-primary p-2" name="envoyer" value="Envoyer"/>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>