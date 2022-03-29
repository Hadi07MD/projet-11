
<?php 
session_start();

include 'gestionProduit.php';
$gestionProduit = new GestionProduit();
$data= $gestionProduit->afficher();

foreach($data as $value){

?>

<div>
<table border="1" width="20%">
<tr>

<td>
    <a href="detail de produit.php?id=<?= $value->getId();?>">
<?= $value->getNom();?></a> </td>
</tr>




</table>

</div>


<?php } ?>

<a href="panier.php">panier</a>
<?php
           $total = 0;
          foreach($listProduits as $value){
          $total = $total + $value["qnt"];

?>
  <?php } ?>

   <td><?= $total ?></td>