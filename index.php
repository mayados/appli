<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ajout produit</title>
</head>
<body>
    
    <div id="container-page">
    <h1>Ajouter un nouveau produit</h1>
        <section id="formulaire">
            <form action="traitement.php" method="post">
                <p>
                    <label>
                        <p class="label-p">Nom du produit :</p>
                        <input type="text" name="name">
                    </label>
                </p>
                <p>
                    <label>
                        <p class="label-p">Prix du produit :</p>
                        <input type="number" step="any" name="price">
                    </label>
                </p>
                <p>
                    <label>
                        <p class="label-p">Quantité désirée :</p>
                        <input type="number" name="qtt" value="1">
                    </label>
                </p>
                <p>
                    <input id="ajouter" type="submit" name="submit" value="Ajouter le produit">
                </p>
            </form>
        </section>
        <div id="recap">
            <a href="recap.php">Récapitulatif</a>            
        </div>

    </div>
</body>
</html>