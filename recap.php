<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulatif des produits</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <p>
            <a name="recapPage" class = "redirectButton" href="index.php">Acceuil</a>
            <a name="clearAll" class = "removeButton" href="traitement.php?action=clear">Retirer Tout</a>
        </p>
    </header>
    <div class="content">
    <div class="wrapper">
    <?php
            echo "<table id='parentTable'>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th>Retirer</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            $countProduct = 0;
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])){ //vérification que soit la clé produit n'éxiste pas soit qu'elle est vide
                echo "<tr><td colspan=6>Aucun produit en session...</td></tr>";
                if (isset($_SESSION['message'])){
                    echo "<script>alert(`".$_SESSION['message']."`)</script>";
                    unset($_SESSION['message']);
                }
            } 
            else {
            foreach($_SESSION['products'] as $index => $product) { // pour chaque élément du tableau products ou index est l'emplacement du tableau product qui contient les info
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // affichage format monétaire ($product['price'] = valeur à modifier, 2 = décimale, "," = séparateur décimal, "&nbsp;" = espace insécable défini pour le séparateur des milier)
                        "<td><a name='".$index."' class='upQuantity'href='traitement.php?action=up_qtt&id=".$index."'>+</a>".$product['qtt']."<a name='".$index."' class='downQuantity'href='traitement.php?action=down_qtt&id=".$index."'>-</a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>
                            <a name='".$index."'class='removeButton'href='traitement.php?action=delete&id=".$index."'>Retirer</a>
                        </td>";
                $totalGeneral += $product['total']; // addition du total de chaque produit pour calculer le total general
                $countProduct += 1;
            }
        }
            $_SESSION['total'] = $totalGeneral; 
            echo "<tr>",
                    "<td colspan=5>Total général : </td>", //affichage total general dans une celulle fuisionner grace a colspan
                    "<td><strong>".number_format($_SESSION['total'],2, ",", "&nbsp;")."&nbsp;€</strong></td>", // affichage valeur total general + format monétaire
                "</tr>", 
                "</tbody>",
                "</table>";
            echo "<br> <br>Il y a ".$countProduct." produit différent.";
            if (isset($_SESSION['message'])){
                echo "<script>alert(`".$_SESSION['message']."`)</script>";
                unset($_SESSION['message']);
            }
    ?>
    </div>
    </div>
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


<!-- une session peut être démarrer pour avoir acces par la suite à une variable global $_SESSION.

cette session enregistre toutes les informations d'un utilisateur côté serveur et permet un accès tant que le navigateur na pas été fermé.
chaque page de l'application à acces à ces informations

les variables globales sont des variable défini accecible depuis n'importe quel scrpit php, 
elle represente les donné donné par l'utilisateur stocké côté serveur.

une faille xss utilise les paramettre côté client pour y injecter du code malvaillant qui pourrais permettre de volé les donné du navigateur 
de l'utilisateur comme des cookies ou autres.

une injection sql utilise par exemple un formulaire ou même l'url pour injecter du code sql qui sera directement exectuer par la base de donné.

pour se proteger de ces faille on a pu ajouter un filtre qui permet de retirer les caractère spéciaux et balise html d'une chaine de caractère
on a aussi ajouter d'autre filtre qui verifie le type de la variable entré dans le champ. -->