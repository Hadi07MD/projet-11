<?php 
session_start();

include 'class/class-panier.php';

$panier = new Panier('produits');

$listProduits = $panier->getPanier();
$total = 0;

?>


<?php if(!$listProduits){ ?>
    <p>le panier est vide</p>
    <?php }else{ ?>

        <table border="2" width="50%" >
             <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Cost</th>
                <th>action</th>
             </tr>
      
        <?php
          foreach($listProduits as $value){
            
           $cost= $value["prix"]*$value["qnt"];
            $total = $total + $cost;   

            ?>
          
            <tr >
                
                <td><?= $value["id"] ?></td>
                <td><?= $value["nom"] ?></td>
                <td><?= $value["prix"] ?> dh</td>
                <td><?= $value["qnt"] ?></td>
                <td><?= $cost ."dh";?></td>
                <td><a href="modifier.php?id=<?= $value["id"] ?>">modifier</a>
                 <a href="supprimer.php?id=<?= $value["id"] ?>">supprimer</a></td>
           
            </tr> 
            
             
        <?php }} ?>


     </table>

     <table>  
         <tr>      
            <th>total :  </th>
            <td><?= $total ."dh";?></td>
            
            </tr>
     </table>

     <a href="index.php">back</a>

     <a href="commande/ajoute-commande.php">achter</a>

     