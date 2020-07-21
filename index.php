<!DOCTYPE HTML>

<?php

include("config.php");

// Connect to database...
$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(mysqli_connect_error()){
    echo "Connection failed:".mysqli_connect_error();
    exit;
}

?>

<html>

<?php
    
include ("them/topbit.php");
include ("content/navigation.html");
    
?>

	<div class="main">

		<h1>Welcome to Chic Clothing</h1>

		<p>Please choose a category from the list above or <a href="#">login</a> to access the admin panel.</p>	

	</div> <!-- end main -->
<?php include ("them/bottombit.php"); ?>		
	

</html>
