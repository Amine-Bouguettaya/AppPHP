<?php
session_start(); //permet de démarrer la session

if(isset($_POST['submit'])){ //verification de l'existence de la clé "submit" dans le tableau $_POST
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); //retire les caractère spéciaux et tte balise html
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //verifie qu'il s'agit bien d'un float et permet d'utiliser la , et .
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // doit être un nombre entier != 0
    if ($name && $price && $qtt) { //vérifie que chaque variable n'est pas = a false ou null
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt
        ];
        $_SESSION['products'][] = $product; //ajout du produit en session
    }
}

header("location:index.php"); //effectue une redirection