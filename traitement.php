<?php
    /* Permet de démarrer une session sur le serveur pour l'utilisateur courant, ou la récupérer s'il en avait déjà une */
    session_start();

    /* Vérifier si la clé "submit" correspond bien à l'attribut "name" du bouton du formulaire : cela limite l'accès à traitement.php. Seules les requêtes HTTP provenant de la soumission de notre formulairesont acceptées */
    if(isset($_POST['submit'])){
        /* Vérification de l'intégralité des valeurs transmises dans le tableau $_POST en fonction de celles que nous attendons */
        $_name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
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

?>