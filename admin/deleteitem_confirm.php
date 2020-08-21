<h1>Delete an Item - Confirm</h1>

<?php
    /* needed to show item name in confirmation message */
	$delstock_sql="SELECT * FROM `L3_prac_stock` WHERE `stockID`=".$_REQUEST['stockID'];
    $delstock_query=mysqli_query($dbconnect, $delstock_sql);
    $delstock_rs=mysqli_fetch_assoc($delstock_query);

?>

<p>Do you really want to delete <?php echo $delstock_rs['name']; ?> from the database?</p>

<p>
   <a href="admin.php?page=deletestock&stockID=<?php echo $_REQUEST['stockID']?>">Yes, Delete it!</a>
   <a href="admin.php?page=adminpanel">No, Take me back.</a>
</p>