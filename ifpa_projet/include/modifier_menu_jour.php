<?php
if(isset($_POST['modifier']))
{
    $id_jour=htmlspecialchars($_POST['id_jour']);
    for($i=0;$i<4;$i++)
    {
        $requete=$bdd->prepare("UPDATE menu SET id_jour=0 WHERE id_jour=$id_jour");
        $requete->execute();
    }
    $menu1=htmlspecialchars($_POST['menu1']);
    $requete2=$bdd->prepare("UPDATE menu SET id_jour=$id_jour WHERE id_menu=$menu1");
    $requete2->execute();
    $menu2=htmlspecialchars($_POST['menu2']);
    $requete3=$bdd->prepare("UPDATE menu SET id_jour=$id_jour WHERE id_menu=$menu2");
    $requete3->execute();
    $menu3=htmlspecialchars($_POST['menu3']);
    $requete4=$bdd->prepare("UPDATE menu SET id_jour=$id_jour WHERE id_menu=$menu3");
    $requete4->execute();
    $menu4=htmlspecialchars($_POST['menu4']);
    $requete5=$bdd->prepare("UPDATE menu SET id_jour=$id_jour WHERE id_menu=$menu4");
    $requete5->execute();
    $message="Menu du jour bien mis à jour";
    header("Location:index.php?page=admin&message=$message");
}
else
{
$id_jour=htmlspecialchars($_GET['id_jour']);
$semaine=['dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi'];
$jour=$semaine[$id_jour];
?>
    <div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-lg-6 p-5">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-12 text-left m-5">
                        <legend>
                            <i class="fas fa-users"><?php echo $jour;?></i>
                        </legend>
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu1">Menu 1</label>
                    <select name="menu1">
                        <?php 
                        $requete=$bdd->prepare("SELECT * FROM menu");
                        $requete->execute();
                        while($donnees=$requete->fetch())
                        {
                        ?>
                        <option value="<?php echo $donnees['id_menu'];?>"><?php echo $donnees['nom'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu2">Menu 2</label>
                    <select name="menu2">
                        <?php 
                        $requete=$bdd->prepare("SELECT * FROM menu");
                        $requete->execute();
                        while($donnees=$requete->fetch())
                        {
                        ?>
                        <option value="<?php echo $donnees['id_menu'];?>"><?php echo $donnees['nom'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu3">Menu 3</label>
                    <select name="menu3">
                        <?php 
                        $requete=$bdd->prepare("SELECT * FROM menu");
                        $requete->execute();
                        while($donnees=$requete->fetch())
                        {
                        ?>
                        <option value="<?php echo $donnees['id_menu'];?>"><?php echo $donnees['nom'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu4">Menu 4</label>
                    <select name="menu4">
                        <?php 
                        $requete=$bdd->prepare("SELECT * FROM menu");
                        $requete->execute();
                        while($donnees=$requete->fetch())
                        {
                        ?>
                        <option value="<?php echo $donnees['id_menu'];?>"><?php echo $donnees['nom'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" class="btn-block btn-primary p-2" name="id_jour" value="<?php echo $id_jour;?>"/>
                <input type="submit" class="btn-block btn-primary p-2" name="modifier" value="Modifier"/>
            </form>
        </div>
     </div>
     </div>   
<?php
}