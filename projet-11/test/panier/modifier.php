<?php  
session_start();

include 'class/gestionPanier.php';


include 'class/class-panier.php';

$panier = new Panier('produits');

$value = $panier->get($_GET["id"]);

?>

<h1><?=$value['nom'];?></h1>
<p> Prix:<?=  $value['prix']; ?> dh</p>


<form action="ajouter.php" method="POST">
<p>
<label for=""> Quntite</label>
<input type="number" name="qnt" value="<?=  $value["qnt"] ?>">
</p>
<p>
<input type="hidden" name="id" value="<?=  $value["id"] ?>">
<button type="submit">ajouter au panier</button>
</p>
</form>
