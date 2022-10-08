<!-- <?php

    session_start();

    /* On veut vider les tableaux products contenus dans la session (=chaque produit) donc on crée un tableau vide  -- Ne pas utiliser UNSET sinon bug en retournant à l'accueil */
    $_SESSION['products'] = array();
    //unset($_SESSION['products']['product']);


    header("Location:recap.php");
?> -->