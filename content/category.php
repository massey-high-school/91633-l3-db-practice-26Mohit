<?php

    if(!isset($_REQUEST['categoryID']))
    {
        header('Location:index.php');
    }

    $stock_sql="SELECT * FROM `L3_prac_stock` JOIN L3_prac_category ON  (L3_prac_stock.categoryID=L3_prac_category.categoryID) WHERE L3_prac_stock.categoryID=".$_REQUEST['categoryID']." ORDER BY L3_prac_stock.name ASC";
    $stock_query=mysqli_query($dbconnect, $stock_sql);
    $stock_rs=mysqli_fetch_assoc($stock_query);
	
	// count # of items found
	$count = mysqli_num_rows($stock_query);

?>

<h3>
    <?php
        echo $stock_rs['catName'];
    ?>
</h3>

<?php
    if($count==0) {

?>

<p>Sorry there are no items in this category</p>

<?php
    } // end of no items if	

else {

?>	

<table class="results">

<?php
    
do{
    ?>
    
    <tr class="results">
        <td class="results">
            <a href="index.php?page=item&stockID=<?php echo $stock_rs
            ['stockID'];?>">
                <?php echo $stock_rs['name'];?>
            </a>
        
        </td>
        
        <td class="results">
        <b>$<?php echo $stock_rs['price'];?></b>
        
        </td>
    
    </tr>
    
    <?php
    
}

while($stock_rs=mysqli_fetch_assoc($stock_query))
    
?>

</table>
<?php
} // end has items else
	?>