

    <div class="container titre_semaine"> <br>
        <h1 class="text-center "> Menu de la semaine</h1><br>
        <div class="row">
            <div class="col-12 col-md-2 "><a href="index.php?page=menu_semaine&id_jour=lundi">Lundi</a></div>
            <div class="col-12 col-md-2"><a href="index.php?page=menu_semaine&id_jour=mardi">Mardi</a></div>
            <div class="col-12 col-md-2"><a href="index.php?page=menu_semaine&id_jour=mercredi">Mercredi</a></div>
            <div class="col-12 col-md-2"><a href="index.php?page=menu_semaine&id_jour=jeudi">Jeudi</a></div>
            <div class="col-12 col-md-2"><a href="index.php?page=menu_semaine&id_jour=vendredi">Vendredi</a></div>
        </div>     
    </div>   
     <br><br>

				<!--Lundi-->
<?php
if (isset($_GET['id_jour'])&&($_GET['id_jour']=='lundi'))
{
    $requete =$bdd->prepare('SELECT * from menu  where id_jour=1');
    $requete->execute();
    if(($requete->rowCount())!=0)
    {
       
        while($data = $requete->fetch())
        {
        ?>
        <div class="container titre_semaine " >
            <div class="row text-center border border-secondary rounded mb-3 p-3">
                <div class="col-12 "><h3> <?php echo $data['nom'];?></h3></div>
                <div class="col-12 ">Prix : <?php echo $data['prix'];?> euros</div>
                <div class="col-12 ">Detail : <br><?php echo $data['detail'];?><br></div>
                
            </div>	
        </div>
        <?php
        }
    }
	else
    {
        echo "<div class=\"alert alert-info\">";
        echo "Menu en cours d'élaboration";
        echo "</div>";
    }
}
elseif (isset($_GET['id_jour'])&&($_GET['id_jour']=='mardi'))
{
    $requete = $bdd->prepare('SELECT * FROM menu WHERE id_jour=2 ');
    $requete->execute();
	if(($requete->rowCount())!=0)
    {
        while($data = $requete->fetch())
        {
        ?>
        <div class="container titre_semaine " >
            <div class="row text-center border border-secondary rounded mb-3 p-3">
                <div class="col-12 "><h3><?php echo $data['nom'];?></h3> </div>
                <div class="col-12 ">Prix : <?php echo $data['prix'];?> euros</div>
                <div class="col-12 ">Detail :<br> <?php echo $data['detail'];?></div>
                
            </div>	
        </div>
        <?php
        }
    }
	else
    {
        echo "<div class=\"alert alert-info\">";
        echo "Menu en cours d'élaboration";
        echo "</div>";
    }
}
elseif (isset($_GET['id_jour'])&&($_GET['id_jour']=='mercredi'))
{
    $requete = $bdd->prepare('SELECT * FROM menu WHERE id_jour=3');
    $requete->execute();
    if(($requete->rowCount())!=0)
    {
        while($data = $requete->fetch())
        {
    ?>
    <div class="container titre_semaine " >
        <div class="row text-center border border-secondary rounded mb-3 p-3">
            <div class="col-12 "><h3> <?php echo $data['nom'];?></h3></div>
            <div class="col-12 ">Prix : <?php echo $data['prix'];?> euros</div>
            <div class="col-12 ">Detail : <br><?php echo $data['detail'];?><br></div>
            
        </div>	
    </div>
    <?php
        }
    }
	 else
    {
        echo "<div class=\"alert alert-info\">";
        echo "Menu en cours d'élaboration";
        echo "</div>";
    }
}
elseif (isset($_GET['id_jour'])&&($_GET['id_jour']=='jeudi'))
{
    $requete = $bdd->prepare('SELECT * FROM menu WHERE id_jour=4 ');
    $requete->execute();
    
    if(($requete->rowCount())!=0)
        {

        while($data = $requete->fetch())
        {
    ?>
    <div class="container titre_semaine " >
        <div class="row text-center border border-secondary rounded mb-3 p-3">
            <div class="col-12 "><h3> <?php echo $data['nom'];?></h3></div>
            <div class="col-12 ">Prix : <?php echo $data['prix'];?> euros</div>
            <div class="col-12 ">Detail : <br><?php echo $data['detail'];?><br></div>
            
        </div>	
    </div>
    <?php
        }
    }
	else
    {
        echo "<div class=\"alert alert-info\">";
        echo "Menu en cours d'élaboration";
        echo "</div>";
    }
}
elseif (isset($_GET['id_jour'])&&($_GET['id_jour']=='vendredi'))
{
    $requete = $bdd->prepare('SELECT * FROM menu WHERE id_jour=5');
    $requete->execute();
    if(($requete->rowCount())!=0)
    {
        while($data = $requete->fetch())
        {
        ?>
        <div class="container titre_semaine " >
            <div class="row text-center border border-secondary rounded mb-3 p-3">
                <div class="col-12 "><h3> <?php echo $data['nom'];?></h3></div>
                <div class="col-12 ">Prix : <?php echo $data['prix'];?> euros</div>
                <div class="col-12 ">Detail : <br><?php echo $data['detail'];?><br></div>
                
            </div>	
        </div>
        <?php
        }
    }
    else
    {
        echo "<div class=\"alert alert-info\">";
        echo "Menu en cours d'élaboration";
        echo "</div>";
    }
    }
else
{
    $today = getdate(); 
    $jour_semaine = ($today['wday']);
    $requete = $bdd->prepare('SELECT * FROM menu WHERE id_jour=:jour_semaine');
    $requete->bindValue(':jour_semaine',$jour_semaine);
    $requete->execute();
    if(($requete->rowCount())!=0)
    {
        while($data = $requete->fetch())
        {
        ?>
        <div class="container titre_semaine " >
            <div class="row text-center border border-secondary rounded mb-3 p-3">
                <div class="col-12 "><h3> <?php echo $data['nom'];?></h3></div>
                <div class="col-12 ">Prix : <?php echo $data['prix'];?> euros</div>
                <div class="col-12 ">Detail : <br><?php echo $data['detail'];?><br></div>
            
            </div>	
        </div>
        <?php
         }
    }
    else
    {
        echo "<div class=\"alert alert-info\">";
        echo "Selectionner le jour pour voir le menu correspondant";
        echo "</div>";
    }
}
?>









