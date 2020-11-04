<?php
$title = 'Accueil - Le Chouette Coin';
require 'includes/header.php';

?>
<div class="contajumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-3 text-white">Bienvenue sur le Chouette Coin !</h1>
        <h3 class="lead">Votre site d'annonces entre particuliers</h3>
        <?php if (!isset($_SESSION['id'])) { ?>
        <a href="signin.php" class="btn btn-warning mt-2">Se connecter !</a>
        <?php
        } ?>
    </div>
</div>

<?php
require 'includes/footer.php';
