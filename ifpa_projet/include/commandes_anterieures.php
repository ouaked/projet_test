<?php
// VERIFIER SI AU MOINS UNE SESSION EST ACTIVE
if (isset($_SESSION['id']))
{
?>

<div class="row mt-2 mb-2">
    <div class="col-12 mt-4 mb-4">
        <h1 class="menu"> Mes commandes antérieures </h1>
    </div>
</div>

<div class="row mt-2 mb-5">
    <div class="col-1">
        &nbsp;
    </div>
    <div class="col-10">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">Date commande</th>
                    <th scope="col">Détail</th>
                    <th scope="col">Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $recherche = $_SESSION['id'];

    // CONNEXION A LA BDD
    include 'connexion_bdd.php';

    $requete = $bdd -> prepare('SELECT * FROM utilisateur NATURAL JOIN commande  WHERE id_utilisateur = :id');

    $requete -> bindValue(':id', $recherche);
	$requete ->execute();

    $requete->execute();

    while ($ligne_tab = $requete->fetch())
    {
    $id_commande=$ligne_tab['id_commande'];
    $requete2 = $bdd->prepare("SELECT * FROM commande NATURAL JOIN menu WHERE id_commande=$id_commande");
    $requete2->execute();
    $detail='';
     while($donnees=$requete2->fetch())
           {
       $detail=$detail.' + '.$donnees['nom'];
            }
                ?>
                <tr>
                    <th scope="row"> <?php echo $ligne_tab['date_commande'] ?> </th>
                    <td><?php echo $detail;?></td>
                    <td><?php echo $ligne_tab['prix'] ?> </td>
                </tr>
                <?php
    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
}
else
{
    // Il n'existe pas de connexion, on renvoie vers la page d'erreur
    header('location: index.php?page=erreur_blocage');
} 
?>