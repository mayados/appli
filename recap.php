<!-- Pour cette page, nous avons besoin de parcourir le tableau session. Il faut donc d'abord récupérer la session de l'utilisateur  -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
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
                        /* Cellule fusionnée de 4 cellules */
                        "<td colspan=4>Total général : </td>",
                        /* &nbsp; est un espace insécable */
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</tbody>",
                "</table>";
        }
    ?>
</body>
</html>