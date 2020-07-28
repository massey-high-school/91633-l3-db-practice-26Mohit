<?php

    if(!isset($_REQUEST['categoryID']))
    {
        header('Location:index.php');
    }

    $stock_sql="SELECT L3_prac_stock.stockID, L3_prac_stock.name,
    L3_prac_stock.price, L3_prac_category.catName 
    FROM L3_prac_stock JOIN L3_prac_category ON    
    (L3_prac_stock.categoryID=L3_prac_category.categoryID)
    WHERE L3_prac_stock.categoryID=".$_REQUEST['categoryID']." 
    ORDER BY L3_prac_stock.name ASC";
    $stock_query=mysqli_query($dbconnect, $stock_sql);
    $stock_rs=mysqli_fetch_assoc($stock_query);

?>

<h3>
    <?php
        echo $stock_rs['catName'];
    ?>
</h3>

<table class="results">

<?php
    
do{
    ?>
    
    <tr class="results">
        <td class="results">
            <a href="index.php?page=item&L3_prac_stockID=<?php echo $stock_rs
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