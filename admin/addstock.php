<?php

$name="";
$price=0;
$categoryID=1;
$topline="";
$description="";
$photo="noimage.php";
$NameErr=$PriceErr=$PhotoErr=$TopErr=$DesErr="";

if(!isset($_SESSION['admin']))
{
    header("Location:index.php");
    exit();
}

// define variables and set to empty values...
$valid=true;
$uploadOk = 1;


?>