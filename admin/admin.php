<!DOCTYPE HTML>

<?php

session_start();
include("../config.php");
include("../functions.php");

// Connect to database...
$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(mysqli_connect_error()){
    echo "Connection failed:".mysqli_connect_error();
    exit;
}

?>

<html>

<head>
    	<link rel="stylesheet" href="../theme/chic.css" title="style1" />
</head>
<?php

include ("content/headers.html");    
include ("theme/heading.php");
include ("admin_navigation.php");
    
?>

	<div class="main">
        
    <?php
    
    if (!isset($_REQUEST['page'])) {
         $page="adminlogin";
    }    
    
    else {
        // prevents users from navigating through file system
        $page=preg_replace('/[^0-9a-zA-Z]-/','',$_REQUEST['page']);
        include("content/$page.php");
    }
        
    // Offer logon if not logged in...
    if ($page=="logout" or $page=="adminlogin" or $page=="login")
        include("$page.php");
    ?>    

	</div> <!-- end main -->
<?php include ("../theme/bottombit.php"); ?>		
	

</html>
