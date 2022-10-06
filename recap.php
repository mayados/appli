<!-- Pour cette page, nous avons besoin de parcourir le tableau session. Il faut donc d'abord récupérer la session de l'utilisateur  -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        /* Si la clé "products" du tableau session n'existe pas OU si elle existe mais ne contient auncune donnée, on affiche un message */
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p> Auncun produit en session...</p>";
        }
        /* Au cas où la clé existe et contient quelque chose, on affiche nos produits dans un tableau HTML */
        else{
            echo "<table class='table table-bordered table-dark'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody class='table-group-divider'>";
            $totalGeneral = 0;
            /* Pour chaque element product du tableau products */
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        /* On modifie l'affichage du prix avec number_format */
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "</tr>";
                $totalGeneral += $product['total'];
            }
            echo    "<tr>",
                        /* Cellule fusionnée de 4 cellules = l'affichage des mots "total général" prend 4 celulles sur 5 */
                        "<td colspan=4>Total général : </td>",
                        /* &nbsp; est un espace insécable */
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</tbody>",
                "</table>";
        }
    ?>

    <a href="index.php">Index</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
