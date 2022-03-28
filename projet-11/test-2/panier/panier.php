  <link rel="stylesheet" href="css/panier.scss">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php 
session_start();

// print_r($_SESSION["paniers"]);

include 'gestionProduit.php';

$gestionProduit = new GestionProduit();

$listProduits = $gestionProduit->getPanier();


?>


     <a href="index.php">back</a>

<!--produits -->
     
     <div class="" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Your Shopping Cart
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Produit</th>
              <th scope="col">Prix</th>
              <th scope="col">Quantité</th>
              <th scope="col">Total</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($listProduits as $value){
            ?>
            <tr>
              <td class="w-25">
                <img src="../img/gallery-image-1-270x195.jpg" class="img-fluid img-thumbnail" alt="Sheep">
              </td>
              <td><?= $value["nom"] ?></td>
              <td><?= $value["prix"] ?> dh</td>
              <td class="qty"><input type="text" class="form-control" id="input1" value="<?= $value["qnt"] ?>"></td>
              <td></td>
              <td>
                <a href="#" class="btn btn-danger btn-sm">supprimer 
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table> 
        <div class="d-flex justify-content-end">
          <h5>Total: <span class="price text-success">89$</span></h5>
        </div>
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Checkout</button>
      </div>
    </div>
  </div>
</div>  