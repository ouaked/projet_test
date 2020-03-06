<?php
if (isset($_SESSION['mail']))
{ 
?>
<!--     MESSAGE DE VALIDATION DE CONNEXION     -->
<div class="card mt-4 mb-4">
    <div class="card-body mt-2 mb-1">
        <div class="alert alert-success text-center" role="alert">
            Vous êtes bien connecté. <br />
            <?php echo 'Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-6 text-center">
        <a href="index.php?page=accueil"> <i class="fas fa-home fa-3x"></i> </a>
    </div>
    <div class="col-6 text-center">
        <a href="index.php?page=profil"> <i class="fas fa-user-cog fa-3x"></i> </a>
    </div>

</div>
<?php
}
?>