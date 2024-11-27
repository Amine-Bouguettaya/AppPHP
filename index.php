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
                <input type="button" name="recapPage" class="redirectButton" value="Récapitulatif" onClick="document.location.href='recap.php'">
            </p>
    </header>
    <div id="content">
        <form action="traitement.php" method="post" class="product-form">
            <h2>Ajouter un Produit</h2>
            <div class="form-group">
                <label for="name">Nom du Produit:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Prix du Produit:</label>
                <input type="number" id="price" name="price" step="any" required>
            </div>
            <div class="form-group">
                <label for="qtt">Quantité désirée:</label>
                <input type="number" id="qtt" name="qtt" value="1" min="1" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Ajouter le produit" class="submitButton">
            </div>
        </form>
    </div>
    <?php
    echo "<br> <br>Il y a ".count($_SESSION['products'])." produit.";
    echo "<br>Il y a un total de ".$_SESSION['count']." articles différent.";
    ?>
</body>
</html>