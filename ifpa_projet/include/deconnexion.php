<?php

session_destroy();
echo "deconnexion en cours";
header("Location:index.php");
?>