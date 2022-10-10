<?php
    /* Permet de démarrer une session sur le serveur pour l'utilisateur courant, ou la récupérer s'il en avait déjà une */
    session_start();

    /* On a indiqué dans index que le mot clé pour récupérer action s'appelle "action"*/
    $action = $_GET["action"];
    /* Pour éviter des erreurs, on vérifie s'il y a bien la valeur à la variable ref / les  ":" signifient que s'il n'y a pas on met rien */
    $ref = (isset($_GET['ref'])) ? $_GET['ref'] : "";
    $quantite = (isset($_GET['quantite'])) ? $_GET['quantite'] : "";
    
    /* Si un produit est ajouté.. */
    switch($action) {

        case "ajouterProduit":
              /* Vérifier si la clé "submit" correspond bien à l'attribut "name" du bouton du formulaire : cela limite l'accès à traitement.php. Seules les requêtes HTTP provenant de la soumission de notre formulairesont acceptées */
            if(isset($_POST['submit'])){
                /* Vérification de l'intégralité des valeurs transmises dans le tableau $_POST en fonction de celles que nous attendons */
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);


                //Nous devons conserver chaque produit renseigné, donc les stocker esession. On décide d'abord de leur organisation au sein de la session 
                if($name && $price && $qtt){

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
                
                    /* On enregistre le produit en session */
                    /* On appelle le tableau session fournit par php, on y indique un clé "products" */
                    $_SESSION['products'][] = $product;
                }
            }


            /* Redirection vers le formulaire, qu'il soit saisi ou non */
            header("Location:index.php");
        break;

        /* On a nommé l'action "viderPanier" dans récap.php. Au cas où c'est cela, on retire tous les produits de la session et on rediirige vers la page recap.php */
        case "viderPanier":
            unset($_SESSION['products']);
            header("Location:recap.php");
        break;

        case "augmenterQuantite":
            $quantite = $quantite+1;
            echo $quantite;
            // header("Location:recap.php");
        break;

        case "baisserQte":

        break;

        case "suppprimerProduit":
            unset($_SESSION['products'][$ref]);
            header("Location:recap.php");
        break;
    }

  
?>