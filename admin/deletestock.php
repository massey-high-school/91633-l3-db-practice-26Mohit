<?php

    $stock_sql="SELECT * FROM `L3_prac_stock` WHERE stockID=".$_REQUEST['stockID'];
    $stock_query=mysqli_query($dbconnect, $stock_sql);
    $stock_rs=mysqli_fetch_assoc($stock_query);

    // Remove image if required
    if ($stock_rs['photo'] != 'noimage.png')

    unlink (IMAGE_DIRECTORY."/".$stock_rs['photo']);

    // Delete item
    $delstock_sql="DELETE FROM `L3_prac_stock` WHERE `stockID`=".$_REQUEST['stockID'];
    $delstock_query=mysqli_query($dbconnect, $delstock_sql);

?> 

<h1>Item Deleted!</h1>

<p>The item has been deleted.</p>

<?php
    include("adminlinks.php");
?>	