<?php
$title = 'Page de profil - Le Chouette Coin';
require 'includes/header.php';
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '{$user_id}'";
$res = $conn->query($sql);
$user = $res->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['s'])) {
    echo '<div class="alert alert-warning"> Votre article a bien été supprimé</div>';
} elseif (isset($_GET['p'])) {
    echo '<div class="alert alert-succes"> Votre numéro de téléphoen a bien été mis à jour ! </div>';
}
?>

<div class="row">
    <div class="col-8">

    </div>

    <div class="col-3 offset-1">
        <h4>Bienvenue <?php echo $user['username']; ?>
        </h4>

        <form action="process.php" method="post">
            <div class="form-group">
                <label for="InputPhone1">Votre numéro de téléphone</label>
                <input class="form-control" type="tel" name="user_phone" id="InputPhone1"
                    value="<?php echo $user['phone']; ?>"
                    pattern="[0-9]{10,}" title="Un numéro de téléphone à 9 chiffres minimum sans indicatif">
            </div>
            <input type="hidden" name="user_id"
                value="<?php echo $user['id']; ?>">
            <input type="submit" class="btn btn-success" name="user_edit" value="Mettre à jour">
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Voir mes articles publiés
        </button>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <table class="table table-warning">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nom du produit</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Ville</th>
                                        <th scope="col">Catégorie</th>
                                        <th scope="col" colspan=3>Fonctions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
        affichageProduitsByUser($user_id);
        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?php
require 'includes/footer.php';
