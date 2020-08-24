<?php

//Delete Category
$delcatID = preg_replace('/[^0-9]/', '', $_POST["delcat"]);

$delcat_sql="SELECT * FROM `L3_prac_category` WHERE categoryID=".$delcatID;
$delcat_query=mysqli_query($dbconnect,$delcat_sql);
$delcat_rs=mysqli_fetch_assoc($delcat_query);

// check if category has item in it
$check_sql="SELECT * FROM `L3_prac_category` WHERE categoryID=$delcatID";
$check_query=mysqli_query($dbconnect, $check_sql);
$count=mysqli_num_rows($check_query);

if ($count>0) {?>
<div class="warning"><p>Warning there are <?php echo $count; ?>
?>

<p>Do you really want to delete category #<?php echo $delcatID ie: the <?php echo $delcat_rs['catName'];?></p>