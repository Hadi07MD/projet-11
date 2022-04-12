<?php

ob_start();
session_start();
$pageTitle = 'Add to basket';

include "./init.php";

if(isset($_SESSION['user'])) { 
    

    $stmt = $con->prepare("SELECT * FROM `basket` where user_id = :user_id");
    $stmt->execute([
        ":user_id" => $_SESSION['uid']
    ]);

    $res = $stmt->fetchAll();

    // echo "<pre>";
    // print_r($res);

    echo "<br>";
    echo "<br>";
    echo "<br>";

    echo "<div class='container'>";

    foreach($res as $r)
    {
    $stmt = $con->prepare("SELECT * FROM `items` where Item_ID = :item_id");
    $stmt->execute([
        ":item_id" => $r['item_id']
    ]);
    $item = $stmt->fetch();

    echo '<div class="col-sm-6 col-md-4">';
        echo '<div class="thumbnail item-box">';
            echo '<span class="price-tag">' . $item['Price'] . 'DH</span>';
            if (empty($item['avatar'])) {
                echo "No Image";
            } else {
                echo "<img class='img-responsive product-img' src='uploads/product_img/" . $item['avatar'] .  "' alt='' style='display: block;width: 100%;height: 200px;object-fit: contain;'/>";
            }
            echo '<div class="caption">';
                echo '<h3><a href="items.php?itemid=' . $item['Item_ID'] . '">' . substr($item['Name'], 0, 16) . '...</a></h3>';
                echo '<p>' . substr($item['Description'], 0, 40) . '...</p>'; ?>
                <span>Quantity</span> : <?php 
                if ($item['Quantity'] == 0){
                    echo '<span>Out of Stock</span>';
                } else {
                    echo $item['Quantity'];
                }
                                    
                echo '<div class="date">' . $item['Add_Date'] . '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
            }

    echo "</div>";

} else
{
    header('location: login.php');
	exit();
}
include $tpl . 'footer.php';
ob_end_flush();

?>