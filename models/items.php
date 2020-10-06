<?php
	include "classes/Db_connect.php";

	function getAllProducts(){
		$db_link = DB_connect::getObject();

		$request ="Select * FROM goods WHERE is_active=1";

		$result = $db_link->dbSelect($request);

		$allItems=[];
		while($row=mysqli_fetch_assoc($result)){
			$allItems[]=$row;
		}
		return $allItems;
	}
	function getAllProductsWithLimits($limit){
		$db_link = DB_connect::getObject();

		$request ="Select * FROM goods WHERE is_active=1 LIMIT $limit";

		$result = $db_link->dbSelect($request);

		$allItems=[];
		while($row=$result->fetch()){
			$allItems[]=$row;
		}
		return $allItems;
	}
?>