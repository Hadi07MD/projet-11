<?php 
	ob_start();
	session_start();

	$pageTitle = 'Homepage';

	include 'init.php';

	$sort ='asc';

	$sort_array = array('asc', 'desc');

	if(isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {

		$sort = $_GET['sort'];

	}

	$stmt2 = $con->prepare("SELECT * FROM categories WHERE parent = 0 ORDER BY Ordering $sort");

	$stmt2->execute();

	$cats = $stmt2->fetchAll(); 

	if (isset($_GET['do']))
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$user_id = $_SESSION['uid'];
			$item_id = $_POST['item_id'];
			echo "<script>alert(" . $item_id .")</script>";
			$stmt = $con->prepare("INSERT INTO basket(item_id, user_id) 
			VALUES (:zitem_id, :zuser_id)");

			$stmt->execute([
				":zitem_id" => $item_id,
				":zuser_id" => $user_id,
			]);
			header("Location: " . $_SERVER['PHP_SELF']);
			exit();
		}
	}

?>

<br><br><br>

<div class="container">

	<div class="row">
		
		<div class="col-sm-4 col-md-3">
			<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="list-group-item text-center active lead">						
			    Categories
		    </li>

			<?php
				foreach($cats as $cat) {
					echo '<li class="subMenu open"> <a>'. $cat['Name'] .'<span class="glyphicon glyphicon-triangle-bottom pull-right"></span></a> ';

					// Get Child Categories
					$childCats = getAllFrom("*", "categories", "where parent = {$cat['ID']}", "", "ID", "ASC");
					if (! empty($childCats)) {

						echo "<ul>";
							foreach ($childCats as $c) {
								echo "<li class=''>
										<a href='categories.php?pageid=" .$c['ID'] . "'><i class='icon-chevron-right'></i>" .$c['Name'] . "</a>
									</li>";
							} 
						echo "</ul>";
					}
					echo '</li>';										
				}
			?>
			</ul>
		</div>



	<div class="col-sm-8 col-md-9">

	<div class="row">
	<div class="product">
			

		<?php 
			$allItems = getAllFrom('*','items', 'where Approve = 1', '', 'Item_ID');
			
			foreach ($allItems as $item) {
				echo '<div class="col-sm-6 col-md-4">';
					echo '<div class="thumbnail item-box">';
						echo '<span class="price-tag">' . $item['Price'] . 'DH</span>';
						if(isset($_SESSION['user'])) {
						echo '
						<form id="basket-form' . $item['Item_ID'] .'" action="?do=add_basket" method="POST">
							<input type="hidden" name="item_id" value="' . $item['Item_ID']  . '"  />
							<input type="hidden" name="user_id" value="' . $_SESSION['uid']  . '"  />
						</form>
						<span class="basket-tag" onclick="document.getElementById(`basket-form'.$item['Item_ID'].'`).submit();"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
						';
						}
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
		?>
	</div>

	</div>
</div>
</div>
</div>

<?php
	include $tpl . 'footer.php'; 
	ob_flush();
?>		
