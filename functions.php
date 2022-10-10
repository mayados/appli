<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/succes.css">
    <title>Document</title>
</head>
<body>
<?php

/* Succes lorsque l'on ajoute un produit */
       
function succes(){
    if(isset($_SESSION['products'])){
        echo $_SESSION['succes'];            
    } else{
        echo "";
    }
}

/* Produit supprimé */
function showMessage(){

    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];        
        echo $message;            
    } else{
        echo "";
    }
}




?>
</body>
</html>