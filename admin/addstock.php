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

<form> method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=addstock");?>" enctype="multipart/form-data">
    
    <h1>Add Item</h1>
    
    <p>
        <b>Item Name:</b>
        <input type="text" name="name" value="<?php echo $name;?>" />
        &nbsp;&nbsp; <span class="error"><?php echo $NameErr;?></span>
    </p>
    
    <p>
        <b>Price: $</b>
        <input type="text" name="price" value="<?php echo $price;?>" size="2" />
        &nbsp;&nbsp; <span class="error"><?php echo $PriceErr;?></span>
    </p>

    
    <p>
        <b>Category</b>    
        <input type="text" name="categoryID" value="" />    
    </p>

    <p>
        <b>Photo</b>    
        <input type="text" name="price" value="" />    
    </p>

    <p>
        <b>Topline</b>    
        <input type="text" name="topline" value="<?php echo $topline; ?>" />
        &nbsp;&nbsp; <span class="error"><?php echo $NameErr;?></span>
    </p>
    
    <p>
        <b>Description</b>&nbsp;&nbsp; <span class="error"><?php echo $NameErr;?></span>
    </p>
    <p>
        <textarea type="text" name="description" cols="60" rows="7"><?php echo $description; ?></textarea>   
    </p>
    
    <input type="submit" name="submit" value="Add Item" />
    
    

</form>