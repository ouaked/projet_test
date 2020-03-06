<?php
if(isset($_POST['modifier']))
{
    $id_menu=htmlspecialchars($_POST['id_menu']);
    $nom=htmlspecialchars($_POST['nom']);
    $detail=htmlspecialchars($_POST['detail']);
    $prix=htmlspecialchars($_POST['prix']);
    $requete = $bdd -> prepare('UPDATE menu SET nom=:nom,detail=:detail,prix=:prix WHERE id_menu = :id_menu');
    $requete -> bindValue(':nom', $nom);
    $requete -> bindValue(':detail', $detail);
    $requete -> bindValue(':prix', $prix);
    $requete -> bindValue(':id_menu', $id_menu);
    $requete->execute();
    $message="Menu bien mis à jour";
    header("Location:index.php?page=admin&message=$message");
}
else
{
$id_menu=htmlspecialchars($_GET['id_menu']);
$requete =$bdd->prepare('SELECT * FROM menu WHERE id_menu = :id_menu');
$requete->execute([':id_menu' => $id_menu]);
$donnees=$requete->fetch();
?>
    <div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-lg-6 p-5">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-12 text-left m-5">
                        <legend>
                            <i class="fas fa-users">Menu</i>
                        </legend>
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu">Nom</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo $donnees['nom'];?>" /><br/>
                </div>
                <div class="form-group">
                    <label for="detail">Détail</label>
                    <input type="text" class="form-control" name="detail" value="<?php echo $donnees['detail'];?>" /><br/>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name="prix" value="<?php echo $donnees['prix'];?>" /><br/>
                </div>
                <input type="hidden" class="btn-block btn-primary p-2" name="id_menu" value="<?php echo $id_menu;?>"/>
                <input type="submit" class="btn-block btn-primary p-2" name="modifier" value="Modifier"/>
            </form>
        </div>
     </div>
     </div>   
<?php
}