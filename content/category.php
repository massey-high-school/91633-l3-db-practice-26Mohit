<?php

    if(!isset($_REQUEST['categoryID']))
    {
        header('Location:index.php');
    }

    $stock_sql="SELECT stock.stockID, stock.nsme, stock.price, 
    category.catName FROM L3_prac_stock JOIN L3_prac_category ON 
    (stock.categoryID=category.categoryID) WHERE stock.categoryID=
    ".$_REQUEST['categoryID']." ORDER BY stock.name ASC";
    $stock_query="";
    $stock_rs="";

?>