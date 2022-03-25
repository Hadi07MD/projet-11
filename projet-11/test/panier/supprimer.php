<?php
session_start();
include 'class/gestionPanier.php';
include 'class/class-panier.php';
$gestion = new GestionP ;
$panier = new Panier('produits');


$panier->delete( $_GET["id"]);
header('location:panier.php');