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
    
include ("theme/topbit.php");
include ("content/navigation.html");
    
?>

	<div class="main">
        
    <?php
    
    if (!isset($_REQUEST['page'])) {
        include("content/home.php");
    }    
    
    else{
        do so
    }    
    ?>    

	</div> <!-- end main -->
<?php include ("theme/bottombit.php"); ?>		
	

</html>
