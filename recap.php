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
</head>
<body>
    <header>
        <p>
            <input type="button" name="recapPage" value="Acceuil" class = "redirectButton" onClick="document.location.href='index.php'">
        </p>
    </header>
    <?php
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])){ //vérification que soit la clé produit n'éxiste pas soit qu'elle est vide
            echo "<p>Aucun produit en session...</p>";
        }
        else {
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>quantité</th>",
                            "<th>Total</th>",
                            "<th>Retiré</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            $countProduct = 0;
            $countProductContent = 0;
            foreach($_SESSION['products'] as $index => $product) { // pour chaque élément du tableau products ou index est l'emplacement du tableau product qui contient les info
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // affichage format monétaire ($product['price'] = valeur à modifier, 2 = décimale, "," = séparateur décimal, "&nbsp;" = espace insécable défini pour le séparateur des milier)
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>
                            <input type='button' name='".$index."' value='Rétirer'>
                        </td>";
                $totalGeneral += $product['total']; // addition du total de chaque produit pour calculer le total general
                $countProduct += 1;
                $countProductContent += $product['qtt'];
                $_SESSION['count']=$countProductContent;
            }
            echo "<tr>",
                    "<td colspan=5>Total général : </td>", //affichage total general dans une celulle fuisionner grace a colspan
                    "<td><strong>".number_format($totalGeneral,2, ",", "&nbsp;")."&nbsp;€</strong></td>", // affichage valeur total general + format monétaire
                "</tr>", 
                "</tbody>",
                "</table>";
            echo "<br> <br>Il y a ".$countProduct." produit diférent pour un total de ".$_SESSION['count']." articles différent.";
        }
    ?>
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