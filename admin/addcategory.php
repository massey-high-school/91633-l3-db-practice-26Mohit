<?php

    $newcat =preg_replace('/[^a-zA-Z0-9]/', '', ($_POST["catName"]));
	
	// PUT new category into database
	$newcat_sql="INSERT INTO `L3_prac_category` (catName) VALUES ('$newcat')";
	$newcat_query=mysqli_query($dbconnect,$newcat_sql);
	
	header('Location:admin.php?page=addcatsuccess');
	
?>	