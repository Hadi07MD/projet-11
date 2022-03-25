<?php

session_start();
include '../class/gestionPanier.php';
include '../class/class-panier.php';
$gestion = new GestionP ;
$panier = new Panier('produits');
$commande = new Panier('commande');

print_r($_SESSION['paniers']['commande']);

$listProduits=$commande->getPanier();


?>

    
    // print_r($_SESSION['paniers']['produits']);
    echo $listProduits['nuCommande'];
    
    // foreach($listProduits as $value){
    

    // }

