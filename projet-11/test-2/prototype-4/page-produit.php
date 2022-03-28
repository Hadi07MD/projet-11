
        <!-- Section-->
        <?php 
include 'gestionProduit.php';
$gestionProduit = new GestionProduit();
$data= $gestionProduit->afficher();

?>

        <section class="py-5">
       
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
        foreach($data as $value){

          ?>
                <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $value->getNom();?></h5>
                                    <!-- Product price-->
                                    <?= $value->getPrix();?> DH
                                </div>
                                <div class="text-center"><a href="detail de produit.php?id=<?= $value->getId();?>"class="btn btn-outline-dark mt-auto" href="#">Détail</a></div>
                            </div>
                            <!-- Product actions-->
                               
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                   </section>
                      
                           
    
    </body>
</html>





