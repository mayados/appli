<?php

session_start();

/* index du produit à retirer */
 $ref = $_GET['retrait'];

 /* Retirer l'élément du tableau products de SESSION */
 unset($_SESSION['products'][$ref]);


/* On redirige vers la page recap.php car la page retrait_produit n'est pas faite pour être vue */
header("Location:recap.php");

?>

