<?php
if(isset($_POST['ajouter']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $detail=htmlspecialchars($_POST['detail']);
    $prix=htmlspecialchars($_POST['prix']);
    $requete = $bdd -> prepare('INSERT INTO menu (nom,detail,prix,id_jour) VALUES(:nom, :detail, :prix,:id_jour)');
    $requete -> bindValue(':nom', $nom);
    $requete -> bindValue(':detail', $detail);
    $requete -> bindValue(':prix', $prix);
    $requete -> bindValue(':id_jour',0);
    $requete->execute();
    $message="Menu bien ajouté";
    header("Location:index.php?page=admin&message=$message");
}
else
{
?>
    <div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-lg-6 p-5">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-12 text-left m-5">
                        <legend>
                            <i class="fas fa-users">Ajouter un Menu</i>
                        </legend>
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu">Nom</label>
                    <input type="text" class="form-control" name="nom"  /><br/>
                </div>
                <div class="form-group">
                    <label for="detail">Détail</label>
                    <input type="text" class="form-control" name="detail" /><br/>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name="prix" /><br/>
                </div>
                <input type="submit" class="btn-block btn-primary p-2" name="ajouter" value="Ajouter"/>
            </form>
        </div>
     </div>
     </div>   
<?php
}