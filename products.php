<?php
$title = 'Produits - Le Chouette Coin';
require 'includes/header.php';
?>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Auteur</th>
        </tr>
    </thead>
    <tbody>
        <?php
        affichageProduits();
    ?>
    </tbody>
</table>

<?php
require 'includes/footer.php';
