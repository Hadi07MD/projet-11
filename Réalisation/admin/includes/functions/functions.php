<?php

   /*
	** Get  All Function V2.0
	** Function To Get All  From Any Database Table 
	*/ 

	function getAllFrom($field, $table, $where, $and, $orderfield, $ordering = "DESC") {

		global $con;

		$getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");

		$getAll->execute();

		$all = $getAll->fetchAll();

		return $all;
	}
	

	/*
	** Title Function V1.0
	** Title Function That Echo The Page Title In Case The page
	** Has The Variable $pageTitle And Echo Defult Titlr For Other Page 
	*/

	function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $pageTitle;

		} else {

			echo 'Default';
		}

	}

	/*
	** Homme Redirect Function V2.0
	** This Function Accept Parameters
	** $theMsg = Echo The Error Message [ Error | Success | Warning ]
	** $url = The link you want to redirect to 
	** $secends = Seconds Before Redirecting
	*/

	function redirectHome($theMsg, $url = null, $seconds = 3) {

		if ($url === null) {

			$url = 'index.php';

			$link = 'Homepage';

		} else {

			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){

				$url = $_SERVER['HTTP_REFERER'];

				$link = 'Previous Page';

			} else {

				$url = 'index.php';

				$link = 'Homepage';

			}

		}

		echo $theMsg;

		echo "<div class='alert alert-info'>You Will Be Redirect To $link After $seconds seconds.</div>";

		header("refresh:$seconds;url=$url");

		exit();

	} 

	/*
	** Check Items Function V1.0
	** Function to Check Item In Database [ Function Accept Parameters ]
	** $select = The Item To Select [ Example: user, category ]
	** $from = The Table To Select Form [ Example: users, items, categories ]
	** $value = The Value Of Select [ Example: Mahjoub, Box, Electronics ]
	*/

	function checkItem($select, $from, $value) {

		global $con;

		$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

		$statement->execute(array($value));

		$count = $statement->rowCount();

		return $count;

	}

	/*
	** Count Number Of Items Function V1.0
	** Function To count Number Of Items Rows 
	** $item = The Item To Count  
	** $table = The Table To Choose From 
	*/

	function countItems($item, $table) {

		global $con; 

		$stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

		$stmt2->execute();

		return $stmt2->fetchColumn();

	}

	/*
	** Get latest Records Function V1.0
	** Function To Get Latest Items From Database [ Users, Items, Comments ]
	** $select = Field To Select 
	** $table = The Table To Choose From 
	** $order = The Desc Ordering
	** $limit Number Of Records To Get
	*/ 

	function getLatest($select, $table, $order, $limit = 5) {

		global $con;

		$getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

		$getStmt->execute();

		$rows = $getStmt->fetchAll();

		return $rows;
	}