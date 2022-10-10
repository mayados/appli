<?php

session_start();
/* Recuperer la quantité  */
$quantite = intval($_GET['ajout']);

/* Incrémenter de 1 ? */
$quantite = $quantite + 1;
echo $quantite;

header("Location:recap.php");

?>