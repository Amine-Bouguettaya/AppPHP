<?php session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
    <header>
            <p>
                <input type="button" name="recapPage" value="Récapitulatif" onClick="document.location.href='recap.php'">
            </p>
    </header>
    <h1>Ajouter un produit</h1>
    <div id="content">
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du Produit:
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du Produit:
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantité désirée:
                <input type="text" name="qtt" value = "1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
    </div>
    <?php
    echo "<br> <br>Il y a ".count($_SESSION['products'])." produit.";
    echo "<br>Il y a un total de ".$_SESSION['count']." articles différent.";
    ?>
</body>
</html>