<?php
session_start();
include '../class/gestionPanier.php';
include '../class/class-panier.php';
$gestion = new GestionP ; 
$panier = new Panier('produits');
$commande = new Panier('commande');

// print_r($_SESSION['produits']);
print_r($_SESSION['paniers']['produits']);

$idCommande = uniqid();

$listProduits=$panier->getPanier();

$list=array("nuCommande"=>$idCommande);

$produits= $_SESSION['paniers']['produits'];
array_push($list,$produits);

?>


<p><?php echo $value["prix"]  ?></p>
<p><?php echo $value["qnt"] ?></p>
<p><?php echo $value["nom"] ?></p>


<?php  

$commande->setAll($list);

header("location:commande.php");
?>
