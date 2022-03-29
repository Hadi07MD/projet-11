<?php 
session_start();

// print_r($_SESSION["paniers"]);

include 'gestionProduit.php';

$gestionProduit = new GestionProduit();

$listProduits = $gestionProduit->getPanier();


?>

        <table border="2" width="50%" >
             <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                
             </tr>
      
        <?php
           $total = 0;
          foreach($listProduits as $value){
            $total = $total + $value["qnt"];
          

            ?>
          
            <tr >
                
                <td><?= $value["id"] ?></td>
                <td><?= $value["nom"] ?></td>
                <td><?= $value["prix"] ?> dh</td>
                <td><?= $value["qnt"] ?></td>
                <td>
                  <a href="modifier.php?id=<?= $value["id"] ?>">modifier</a>
                  <a href="supprimer.php?id=<?= $value["id"] ?>">supprimer</a>
                 </td>

              
            </tr> 
            
             
        <?php } ?>
        
        <td>Total de quantité:  <?= $total ?></td>


     </table>

   

     <a href="index.php">back</a>


     