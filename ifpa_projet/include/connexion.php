<?php 
if(isset($_POST['connexion_submit']))
{

    $mail=htmlspecialchars(trim($_POST['mail_connexion']));
    $mdp_connexion=htmlspecialchars(trim($_POST['mdp_connexion']));
    $requete =$bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
    $requete->execute([':mail' => $mail]);
    if($donnees=$requete->fetch())
    {   
        $mdp=$donnees['mdp'];
        if(password_verify($mdp_connexion,$mdp))
        {
            $_SESSION['mail']=$mail;
            $_SESSION['nom']=$donnees['nom'];
            $_SESSION['prenom']=$donnees['prenom'];
            $_SESSION['id'] = $donnees['id_utilisateur']; 
            header("Location:index.php?page=validation_connexion");
        }
        else
        {
            $erreur="Le mot de passe n'est pas valide";
            header("Location:index.php?page=connexion&erreur_mdp_connexion=$erreur&mail=$mail");	
        }
    }
    else
    {
        $erreur="Cet email n'existe pas";
        header("Location:index.php?page=connexion&erreur_email_connexion=$erreur");	
    }
    
}
elseif(isset($_POST['inscription_submit']))
{
    $mail=htmlspecialchars(trim($_POST['mail_inscription']));
    $requete =$bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
    $requete->execute([':mail' => $mail]);
    if($donnees=$requete->fetch())
    {   
        $erreur="Cet émail est déjà pris";
        header("Location:index.php?page=connexion&erreur_email_inscription=$erreur");
    }
    else
    {
        $nom=htmlspecialchars(trim($_POST['nom_inscription']));
        $prenom=htmlspecialchars(trim($_POST['prenom_inscription']));
        $fonction=htmlspecialchars(trim($_POST['fonction']));
        $role=0;
        $mail=htmlspecialchars(trim($_POST['mail_inscription']));
        $mdp=htmlspecialchars(trim($_POST['mdp_inscription']));
        $mdp=password_hash($mdp, PASSWORD_DEFAULT);
        $cagnotte=0;
        $requete = $bdd->prepare('INSERT INTO utilisateur (nom,prenom,mail,mdp,role,fonction,cagnotte) VALUES(:nom, :prenom, :mail, :mdp, :role,:fonction,:cagnotte)');
        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':prenom', $prenom);
        $requete->bindValue(':mail', $mail);
        $requete->bindValue(':mdp', $mdp);
        $requete->bindValue(':role', $role);
        $requete->bindValue(':fonction', $fonction);
        $requete->bindValue(':cagnotte',$cagnotte);
        $requete->execute();
        $_SESSION['mail']=$mail;
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['id']=$bdd->lastInsertId();
        header("Location:index.php?page=validation_connexion");
    }
}
else
{
?>
<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-lg-6 p-5">
            <form method="POST" action="" id="connexion">
                <div class="row">
                    <div class="col-12 text-left m-5">
                        <legend>
                            <i class="fas fa-users">Connexion</i>
                        </legend>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email_connexion">Email</label>
                    <input type="text" class="form-control" name="mail_connexion" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];}?>" placeholder="Entrer votre email"/><br/>
                    <small id="email_connexion_alert" class="alert alert-danger">Veuillez rentrer votre email</small>
                    <?php if(isset($_GET['erreur_email_connexion']))
{
                    ?>
                    <div class="alert alert-danger"><?php echo $_GET['erreur_email_connexion'];?></div>
                    <?php
}
                    ?>
                </div>
                <div class="form-group">
                    <label for="mdp_connexion">Mot de passe</label>
                    <input type="password" class="form-control" name="mdp_connexion"  placeholder="Entrer votre mot de passe"/><br/>
                    <small id="mdp_connexion_alert" class="alert alert-danger">Le mot de passe est vide</small>
                    <?php if(isset($_GET['erreur_mdp_connexion']))
                    {
                    ?>
                    <div class="alert alert-danger"><?php echo $_GET['erreur_mdp_connexion'];?></div>
                    <?php
                    }
                    ?>
                </div>
                <p><a href="index.php?page=renvoi_mdp">Mot de passe oublié?</a></p>
                <input type="submit" class="btn-block btn-primary p-2" name="connexion_submit" value="Connexion"/>
            </form>
        </div>
        <hr>
        <div class="col-12 col-lg-6 p-5">
            <form method="POST" action="" id="inscription">
                <div class="row">
                    <div class="col-12 text-left m-5">
                        <legend >
                            <i class="fas fa-users"> Inscription</i>
                        </legend>
                    </div>

                </div>
                <div class="form-group">
                    <label for="nom_inscription">Nom</label>
                    <input type="text" class="form-control" name="nom_inscription"  placeholder="Entrer votre nom"/><br/>
                    <small id="nom_inscription_alert" class="alert alert-danger">Veuillez choisir un nom</small>
                </div>
                <div class="form-group">
                    <label for="prenom_inscription">Prénom</label>
                    <input type="text" class="form-control" name="prenom_inscription"  placeholder="Entrer votre prénom"/><br/>
                    <small id="prenom_inscription_alert" class="alert alert-danger">Veuillez choisir un prenom</small>
                </div>
                <div class="form-group">
                    <label for="email_inscription">mail</label>
                    <input type="email" class="form-control" name="mail_inscription"  placeholder="Entrer votre email"/><br/>
                    <small id="email_inscription_alert" class="alert alert-danger">Veuillez choisir un email</small>
                </div>
                <div class="form-group">
                    <label for="fonction">Fonction</label>
                    <select name="fonction">
                        <option value="stagiaire">Stagiaire</option>
                        <option value="professeur">Prof</option>
                        <option value="visiteur">Visiteur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mdp_inscription">Mot de passe</label>
                    <input type="password" class="form-control" name="mdp_inscription"  placeholder="Entrer votre mot de passe"/><br/>
                    <small id="mdp_inscription_alert" class="alert alert-danger">le mot de passe est vide</small>
                </div>
                <div class="form-group">
                    <label for="mdp_verif">Retaper le mot de passe</label>
                    <input type="password" class="form-control" name="mdp_verif"  placeholder="Entrer à nouveau votre mot de passe"/><br/>
                    <small id="mdp_inscription_verif_alert" class="alert alert-danger">le mot de passe est vide</small>
                    <small id="mdp_verif_alert" class="alert alert-danger">Les deux mot de passe ne correspondent pas</small>
                </div>
                <input type="submit" class="btn-block btn-primary p-2" name="inscription_submit" value="Inscription"/>
            </form>
        </div>
    </div>
</div>
<?php
}
?>