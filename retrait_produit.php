<?php

session_start();

/* Nous récupérons le retrait quand le clic sur le lien est effectué, et récupérons l'index de l'élément cliqué = index du produit à retirer */
$ref = $_GET['retrait'];

/* Nous stockons le tableau products de $_SESSION dans une variable (car nous devons exécuter sur ce dernier des foncitons) */
$array = $array = $_SESSION['products'];

/* Nous cherchons la référence dans le tableau et attribuons son rang*/
$key = array_search($ref, $array);

/* On retire l'élément situé au rang enregistré dans key  */
array_splice($_SESSION['products'], $key, 1);

/* On redirige vers la page recap.php car la page retrait_produit n'est pas faite pour être vue */
header("Location:recap.php");

?>

