<?php session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>
<body>
    <header>
            <a href="recap.php" name="recapPage" class="redirectButton">Panier</a>
    </header>
    <div class="content">
        <div class="wrapper">
            <form action="traitement.php?action=add" method="post" class="parentForm">
                <h2>Ajouter un Produit</h2>
                <div class="formElement">
                    <label for="name">Nom du Produit:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="formElement">
                    <label for="price">Prix du Produit:</label>
                    <input type="number" id="price" name="price" step="any" required>
                </div>
                <div class="formElement">
                    <label for="qtt">Quantité:</label>
                    <input type="number" id="qtt" name="qtt" value="1" required>
                </div>
                <div class="formElement">
                    <input type="submit" name="submit" value="Ajouter le produit" class="submitButton">
                </div>
        </div>
        </form>
    </div>
    <?php
    if (isset($_SESSION['products'])) {
        echo "<br> <br>Il y a ".count($_SESSION['products'])." produit.";
    }
    if (isset($_SESSION['message'])){
        echo "<script>alert(`".$_SESSION['message']."`)</script>";
        unset($_SESSION['message']);
    }
    ?>
<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="social" role="navigation" aria-labelledby="social-heading">
        <h3 id="social-heading" class="sr-only">Follow us on social media</h3>
        <a href="https://github.com/Amine-Bouguettaya?tab=repositories" aria-label="Github" target="_blank"><i class="fa-brands fa-github"></i></a>
    </div>
    <hr class="footer-break">
    <ul class="footer-links" role="navigation" aria-labelledby="footer-links-heading">
        <h3 id="footer-links-heading" class="sr-only">Footer Links</h3>
        <li><a href="index.php">Acceuil</a></li>
        <li><a href="#">Contents</a></li>
    </ul>
    <p class="copyright">© 2024</p>
</footer>
</body>
</html>