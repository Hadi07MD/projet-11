<?php

require("./person.php");

$liste_persons = [];

 // Saisie des données
 $person = new Person;
 $person->setNom("El Mliki");
 $person->setPrenom("Hicham");
 $liste_persons[] = $person ;



 // Traitement
 $liste_persons_json =  json_encode($liste_persons);
 
 // Affichage
 echo $liste_persons_json;
?>